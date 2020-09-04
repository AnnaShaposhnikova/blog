<?php
namespace frontend\models;

use Yii;
use yii\base\Model;
use common\models\User;
use yii\validators\CompareValidator;
use yii\validators\EmailValidator;
use yii\validators\UniqueValidator;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $first_name;
    public $last_name;
    public $email;
    public $password;
    public $passwordConfirmation;
    public $rememberMe;



    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // username and password are both required
            [['first_name', 'last_name','email','password'], 'required'],

            // password is validated by validatePassword()
            ['password', 'validatePassword'],
            //пароль не менее 4 символов
            ['password','string','min'=>4],
            //email это email
            ['email', EmailValidator::class],
            ['email',UniqueValidator::class,'targetClass'=> User::class,'targetAttribute'=>'email'],
            ['passwordConfirmation', CompareValidator::class, 'compareAttribute' => 'password'],
            ['rememberMe','boolean'],
        ];
    }

    public function passwordHash($password){
        $hash = Yii::$app->getSecurity()->generatePasswordHash($password);
        return $hash;

    }

    /**
     * Validates the password.
     * This method serves as the inline validation for password.
     *
     * @param string $attribute the attribute currently being validated
     * @param array $params the additional name-value pairs given in the rule
     */
    public function validatePassword($attribute, $params)
    {
        if($this->hasErrors()){
            $this->addError($attribute, 'Incorrect email or password.');
        }

    }

    public function signup(){
        if($this->validate()){
            $user = $this->createUser();
            return Yii::$app->user->login($user);

        }
        return false;
    }

    private function createUser()
    {
        $user=new User();
        $user->first_name = $this->first_name;
        $user->last_name = $this->last_name;
        $user->email = $this->email;
        $user->password = $this->passwordHash($this->password);
  // назначаем роль
        $user->role = User::USER_ROLE;

        if(! $user->save()){
            throw new \Exception();
        }
        return $user;
    }

}
