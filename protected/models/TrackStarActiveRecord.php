<?php 

abstract class TrackStarActiveRecord extends CActiveRecord
{
	/**
     * Prepares create_time, create_user_id, update_time and update_user_id attributes before performing validation.
     */
     protected function beforeValidate()
    {
    	if($this->isNewRecord)
        {
        	// set the create date, last updated date and the user doing thecreating
        	$this->create_time = $this->update_time=new CDbExpression('NOW()');
        	//$this->createTime=$this- >updateTime=date( 'Y-m-d H:i:s', time() );
        	$this->create_user_id = $this->update_user_id = Yii::app()->user->id;
        }

        return parent::beforeValidate();
     }
}