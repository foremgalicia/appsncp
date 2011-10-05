<?php

class UnidadesController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('index', 'create','update', 'view'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model				= new Unidades;
		$cualificaciones 	= array();
		$cualificacionesSel = array();

		if(isset($_POST['Unidades']))
		{
			$transaction = Yii::app()->db->beginTransaction();
			try
			{	
				$model->attributes=$_POST['Unidades'];
				if($model->save())
				{
					// record the unidades
					if(isset($_POST['Unidades']['cualificaciones']) && count($_POST['Unidades']['cualificaciones'] > 0))
					{
						$orden = 1;
						foreach($_POST['Unidades']['cualificaciones'] as $idCualificacion)
						{
							$modelCualificacionesUnidades = new CualificacionesUnidades;
							$modelCualificacionesUnidades->id_cualificacion = $idCualificacion;
							$modelCualificacionesUnidades->id_unidad		= $model->id;
							$modelCualificacionesUnidades->orden			= $orden;
							$modelCualificacionesUnidades->save();
							$orden++;
						}
					}
					$transaction->commit();
					// redirect to detailed view					
					$this->redirect(array('view','id'=>$model->id));
				}
				$transaction->commit();
				// used to restore the view
				if(isset($_POST['Unidades']['cualificaciones']) && count($_POST['Unidades']['cualificaciones'] > 0))
				{
					$cualificaciones = $_POST['Unidades']['cualificaciones'];
					// necessary code to restore the selected "unidades" on validation error
					$criteria = new CDbCriteria;
					$criteria->addInCondition('id', $cualificaciones);
					$cualificacionesTemp = CHtml::listData(Cualificaciones::model()->findAll($criteria), 'id', 'titulo_gal');
					foreach($cualificaciones as $cualificacionId)
					{
						$cualificacionesSel[$cualificacionId] = $cualificacionesTemp[$cualificacionId];
					}
				}
			}
			catch(Exception $e) // an exception is raised if a query fails
			{
			    $transaction->rollBack();
			}	
		}
		// get all unidades
		$todasCualificaciones = CHtml::listData(Cualificaciones::model()->findAll(array('order'=>'titulo_gal')), 'id', 'titulo_gal');
		// render view
		$this->render('create',array(
			'model'					=> $model,
			'cualificaciones'		=> $cualificaciones,
			'todasCualificaciones' 	=> array_unique($cualificacionesSel + $todasCualificaciones),
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model				= $this->loadModel($id);
		$cualificaciones 	= array();
		$cualificacionesSel = array();
		
		// get the cualificaciones ordered	
		$cualificacionesOrdered = Cualificaciones::model()->findAll(CualificacionesUnidades::getCriteriaCualificacionesUnidad($id));
		if(isset($model->cualificaciones) && count($model->cualificaciones) > 0 && !isset($_POST['Unidades']))
		{
			foreach($cualificacionesOrdered as $cualificacion)
			{
				$cualificaciones[] 	= $cualificacion->id;
				$cualificacionesSel[$cualificacion->id]	= $cualificacion->titulo_gal;
			}
		}

		if(isset($_POST['Unidades']))
		{
			$transaction = Yii::app()->db->beginTransaction();
			try
			{
				$model->attributes=$_POST['Unidades'];
				if($model->save())
				{
					CualificacionesUnidades::model()->deleteAll('id_unidad=:id_unidad', array(':id_unidad'=>$model->id));
					// record the unidades
					if(isset($_POST['Unidades']['cualificaciones']) && count($_POST['Unidades']['cualificaciones'] > 0))
					{
						$orden = 1;
						foreach($_POST['Unidades']['cualificaciones'] as $idCualificacion)
						{
							$modelCualificacionesUnidades = new CualificacionesUnidades;
							$modelCualificacionesUnidades->id_cualificacion = $idCualificacion;
							$modelCualificacionesUnidades->id_unidad		= $model->id;
							$modelCualificacionesUnidades->orden			= $orden;
							$modelCualificacionesUnidades->save();
							$orden++;
						}
					}
					$transaction->commit();
					// redirect to detailed view					
					$this->redirect(array('view','id'=>$model->id));
				}
				$transaction->commit();
				// used to restore the view
				if(isset($_POST['Unidades']['cualificaciones']) && count($_POST['Unidades']['cualificaciones'] > 0))
				{
					$cualificaciones = $_POST['Unidades']['cualificaciones'];
					// necessary code to restore the selected "unidades" on validation error
					$criteria = new CDbCriteria;
					$criteria->addInCondition('id', $cualificaciones);
					$cualificacionesTemp = CHtml::listData(Cualificaciones::model()->findAll($criteria), 'id', 'titulo_gal');
					foreach($cualificaciones as $cualificacionId)
					{
						$cualificacionesSel[$cualificacionId] = $cualificacionesTemp[$cualificacionId];
					}
				}
			}
			catch(Exception $e) // an exception is raised if a query fails
			{
			    $transaction->rollBack();
			}	
		}
		// get all unidades
		$todasCualificaciones = CHtml::listData(Cualificaciones::model()->findAll(array('order'=>'titulo_gal')), 'id', 'titulo_gal');
		// render view
		$this->render('update',array(
			'model'					=> $model,
			'cualificaciones'		=> $cualificaciones,
			'todasCualificaciones' 	=> array_unique($cualificacionesSel + $todasCualificaciones),
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		// we only allow deletion via POST request
		if(Yii::app()->request->isPostRequest)
		{
			$transaction = Yii::app()->db->beginTransaction();
			try
			{
				// delete cualificacione relationships
				CualificacionesUnidades::model()->deleteAll('id_unidad=:id_unidad', array(':id_unidad'=>(int)$id));
				// delete unidades
				$this->loadModel($id)->delete();
				$transaction->commit();
			}
			catch(Exception $e) // an exception is raised if a query fails
			{
			    $transaction->rollBack();
			    throw new CHttpException(500);
			}

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
		}
		else
			throw new CHttpException(400);
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$model=new Unidades('search');
		$model->unsetAttributes();  // clear any default values
		$cualificacion = '';
		if(isset($_GET['Unidades']))
		{
			$model->attributes=$_GET['Unidades'];
		}

		$this->render('admin',array(
			'model'			=> $model,
			'cualificacion'	=> $cualificacion,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=Unidades::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='unidades-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
