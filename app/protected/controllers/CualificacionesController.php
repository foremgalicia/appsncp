<?php

class CualificacionesController extends Controller
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
		$model			= new Cualificaciones;
		$unidades 		= array();
		$unidadesSel 	= array();

		if(isset($_POST['Cualificaciones']))
		{
			$transaction = Yii::app()->db->beginTransaction();
			try
			{	
				$model->attributes=$_POST['Cualificaciones'];
				if($model->save())
				{
					// record the unidades
					if(isset($_POST['Cualificaciones']['unidades']) && count($_POST['Cualificaciones']['unidades'] > 0))
					{
						$orden = 1;
						foreach($_POST['Cualificaciones']['unidades'] as $idUnidade)
						{
							$modelCualificacionesUnidades = new CualificacionesUnidades;
							$modelCualificacionesUnidades->id_cualificacion = $model->id;
							$modelCualificacionesUnidades->id_unidad		= $idUnidade;
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
				if(isset($_POST['Cualificaciones']['unidades']) && count($_POST['Cualificaciones']['unidades'] > 0))
				{
					$unidades = $_POST['Cualificaciones']['unidades'];
					// necessary code to restore the selected "unidades" on validation error
					$criteria = new CDbCriteria;
					$criteria->addInCondition('id', $unidades);
					$unidadesTemp = CHtml::listData(Unidades::model()->findAll($criteria), 'id', 'titulo_gal');
					foreach($unidades as $unidadId)
					{
						$unidadesSel[$unidadId] = $unidadesTemp[$unidadId];
					}
				}
			}
			catch(Exception $e) // an exception is raised if a query fails
			{
			    $transaction->rollBack();
			}
		}
		// get all unidades
		$todasUnidades = CHtml::listData(Unidades::model()->findAll(array('order'=>'titulo_gal')), 'id', 'titulo_gal');
		// render view
		$this->render('create',array(
			'model'			=> $model,
			'unidades'		=> $unidades,
			'todasUnidades' => array_unique($unidadesSel + $todasUnidades),
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model			= $this->loadModel($id);
		$unidades 		= array();
		$unidadesSel 	= array();
		
		// get the unidades ordered	
		$unidadesOrdered = Unidades::model()->findAll(CualificacionesUnidades::getCriteriaUnidadesCualidicacion($id));
		if(isset($unidadesOrdered) && count($unidadesOrdered) > 0 && !isset($_POST['Cualificaciones']))
		{
			foreach($unidadesOrdered as $unidad)
			{
				$unidades[] 	= $unidad->id;
				$unidadesSel[$unidad->id] 	= $unidad->titulo_gal;
			}
		}

		if(isset($_POST['Cualificaciones']))
		{
			$transaction = Yii::app()->db->beginTransaction();
			try
			{
				$model->attributes=$_POST['Cualificaciones'];
				if($model->save())
				{
					CualificacionesUnidades::model()->deleteAll('id_cualificacion=:id_cualificacion', array(':id_cualificacion'=>$model->id));
					// record the unidades
					if(isset($_POST['Cualificaciones']['unidades']) && count($_POST['Cualificaciones']['unidades'] > 0))
					{
						$orden = 1;
						foreach($_POST['Cualificaciones']['unidades'] as $idUnidad)
						{
							$modelCualificacionesUnidades = new CualificacionesUnidades;
							$modelCualificacionesUnidades->id_cualificacion = $model->id;
							$modelCualificacionesUnidades->id_unidad		= $idUnidad;
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
				if(isset($_POST['Cualificaciones']['unidades']) && count($_POST['Cualificaciones']['unidades'] > 0))
				{
					$unidades = $_POST['Cualificaciones']['unidades'];
					// necessary code to restore the selected "unidades" on validation error
					$criteria = new CDbCriteria;
					$criteria->addInCondition('id', $unidades);
					$unidadesTemp = CHtml::listData(Unidades::model()->findAll($criteria), 'id', 'titulo_gal');
					foreach($unidades as $unidadId)
					{
						$unidadesSel[$unidadId] = $unidadesTemp[$unidadId];
					}
				}
			}
			catch(Exception $e) // an exception is raised if a query fails
			{
			    $transaction->rollBack();
			}	
		}
		// get all unidades
		$todasUnidades = CHtml::listData(Unidades::model()->findAll(array('order'=>'titulo_gal')), 'id', 'titulo_gal');
		// render view
		$this->render('update',array(
			'model'			=> $model,
			'unidades'		=> $unidades,
			'todasUnidades' => array_unique($unidadesSel + $todasUnidades),
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
				// get all unidades id
				$idUnidades = CualificacionesUnidades::model()->findAll('id_cualificacion=:id_cualificacion', array(':id_cualificacion'=>(int)$id));
				// delete cualificacione relationships			
				CualificacionesUnidades::model()->deleteAll('id_cualificacion=:id_cualificacion', array(':id_cualificacion'=>(int)$id));
				// delete the unidades
				if(isset($idUnidades) && count($idUnidades) > 0)
				{
					foreach($idUnidades as $idUnidad)
					{
						$unidades = CualificacionesUnidades::model()->findAll('id_unidad=:id_unidad', array(':id_unidad'=>$idUnidad->id_unidad));
						if(!(isset($unidades) && count($unidades) > 0))
						{
							Unidades::model()->deleteByPk($idUnidad->id_unidad);
						}
					}
				}
				// delete cualificaciones
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
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$model=new Cualificaciones('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Cualificaciones']))
			$model->attributes=$_GET['Cualificaciones'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=Cualificaciones::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'A  páxina buscada non existe.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='cualificaciones-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
