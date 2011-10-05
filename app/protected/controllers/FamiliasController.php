<?php

class FamiliasController extends Controller
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
		$model=new Familias;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Familias']))
		{
			$model->attributes=$_POST['Familias'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Familias']))
		{
			$model->attributes=$_POST['Familias'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
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
				$model = $this->loadModel($id);
				if(isset($model->cualificaciones) && count($model->cualificaciones) > 0)
				{
					foreach($model->cualificaciones as $cualificacion)
					{
						// get all unidades id
						$idUnidades = CualificacionesUnidades::model()->findAll(
											'id_cualificacion=:id_cualificacion', array(':id_cualificacion'=>$cualificacion->id));
						// delete cualificacione relationships			
						CualificacionesUnidades::model()->deleteAll(
															'id_cualificacion=:id_cualificacion', 
															array(':id_cualificacion'=>$cualificacion->id)
														);
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
						// delete the cualificacion
						Cualificaciones::model()->findByPk($cualificacion->id)->delete();
					}
				}
				// delete the familia
				$model->delete();
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
		$model=new Familias('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Familias']))
			$model->attributes=$_GET['Familias'];

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
		$model=Familias::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='familias-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
