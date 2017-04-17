<?php
namespace app\modules\users\models\forms;

use app\models\Referals;
use app\models\UserInfo;
use app\modules\users\models\User;
use yii\base\Model;
use Yii;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $username;
    public $email;
    public $password;
    public $password_repeat;
    public $ref;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['username', 'filter', 'filter' => 'trim'],
            ['username', 'required'],
            ['username', 'string', 'min' => 2, 'max' => 255],
            ['username', 'unique', 'targetClass' => 'app\modules\users\models\User', 'message' => Yii::t('users', 'THIS_USERNAME_ALREADY_TAKEN')],

            ['email', 'filter', 'filter' => 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'unique', 'targetClass' => 'app\modules\users\models\User', 'message' => Yii::t('users', 'THIS_EMAIL_ALREADY_TAKEN')],

            [['password', 'password_repeat'], 'required'],
            [['password', 'password_repeat'], 'string', 'min' => 6],
            ['password_repeat', 'compare', 'compareAttribute' => 'password'],

            ['ref', 'string'],
        ];
    }


    public function attributeLabels()
    {
        return [
            'username' => Yii::t('users', 'USERNAME'),
            'email' => Yii::t('users', 'EMAIL'),
            'password' => Yii::t('users', 'PASSWORD'),
            'password_repeat' => Yii::t('users', 'PASSWORD_REPEAT'),
            'ref' => 'Спонсор',
        ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup()
    {
        if ($this->validate()) {
            $user = new User();
            $user->attributes = $this->attributes;
            $user->status = User::STATUS_NEW;
            $user->setPassword($this->password);
            $user->generateAuthKey();
            if(!empty($this->ref)){
                $parent = User::find()->where(['username'=>$this->ref])->one();
                if(!empty($parent)){
                    $referal = new Referals();
                    $referal->parent1 = $parent['id'];
                    $parent1 = Referals::find()->where(['user_id'=>$parent['id']])->one();
                    if(!empty($parent1)){
                        $referal->parent2 = $parent1['parent1'];
                        $referal->parent3 = $parent1['parent2'];
                        $referal->parent4 = $parent1['parent3'];
                        $referal->parent5 = $parent1['parent4'];
                        $referal->parent6 = $parent1['parent5'];
                        $referal->parent7 = $parent1['parent6'];
                        $referal->parent8 = $parent1['parent7'];
                        $referal->parent9 = $parent1['parent8'];
                        $referal->parent10 = $parent1['parent9'];
                        $referal->parent11 = $parent1['parent10'];
                        $referal->parent12 = $parent1['parent11'];
                        $referal->parent13 = $parent1['parent12'];
                        $referal->parent14 = $parent1['parent13'];
                        $referal->parent15 = $parent1['parent14'];

                    }
                }else{
                    return null;
                }
            }

            if ($user->save()) {
                $referal->user_id = $user->id;
                $referal->save();
                $user_info = new UserInfo();
                $user_info->user_id = $user->id;
                $user_info->save();
                return $user;
            }
        }

        return null;
    }

}
