<?php
 
/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
    /**
     * @var string email
     */
    public $email;
    /**
     * @var int id
     */
    private $_id;
 
    const ERROR_EMAIL_INVALID=1;
 
    public function __construct($username, $password, $email)
    {
        parent::__construct($username, $password);
        $this->email=$email;
    }
 
 
    /**
     * Authenticates a user.
     * The example implementation makes sure if the email and password
     * are both 'demo'.
     * In practical applications, this should be changed to authenticate
     * against some persistent user identity storage (e.g. database).
     * @return boolean whether authentication succeeds.
     */
    public function authenticate()
    {
        $model=Users::model()->findByAttributes(array('email'=>$this->email,'password'=>$this->password));
        if($model===null){
            $this->errorCode=self::ERROR_EMAIL_INVALID;
        } else if(!crypt($this->password, $model->password)){
            $this->errorCode=self::ERROR_PASSWORD_INVALID;
        } else {
            $this->_id = $model->uid;
        	Yii::app()->user->setState("name",$model->first_name." ".$model->last_name);
        	Yii::app()->user->setState('email',$model->email);
            $this->username = $model->email;
            $this->errorCode = self::ERROR_NONE;
            return !$this->errorCode;
        }
    }
 
    /**
     * @return integer the ID of the user record
     */
    public function getId()
    {
        return $this->_id;
    }
}