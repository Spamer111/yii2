<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * LoginForm is the model behind the login form.
 *
 * @property User|null $user This property is read-only.
 *
 */
class LoginForm extends Model
{
    public $username;
    public $password;
    public $rememberMe = true;

    private $_user = false;


    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // username and password are both required
            [['username', 'password'], 'required'],
            // rememberMe must be a boolean value
            ['rememberMe', 'boolean'],
            // password is validated by validatePassword()
            ['password', 'validatePassword'],
        ];
    }

    public function attributeLabels(){ // позволяет задать название полей формы
        return [
            'username' =>'Логин',
            'password' =>'Пароль',
            'rememberMe' =>'Запомнить',
        ];

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
        if (!$this->hasErrors()) { // поверяем наличие ошибок
            $user = $this->getUser(); // если ошибок нет то вызываем метод getUser()

            if (!$user || !$user->validatePassword($this->password)) { // если обьект user не создан или правила валидации не пройдены
                $this->addError($attribute, 'Логин/пароль введены не верно'); // выводим текст ошибки
            }
        }
    }

    /**
     * Logs in a user using the provided username and password.
     * @return bool whether the user is logged in successfully
     */
    public function login()
    {
        if ($this->validate()) { // если валидация прошла успешно
            if($this->rememberMe) {
                $u = $this->getUser(); // сгененируем случайную строку и записываем ее в переменую
                $u->generateAuthKey(); // обновляем
                $u->save(); // сохраняем
            }
            return Yii::$app->user->login($this->getUser(), $this->rememberMe ? 3600*24*30 : 0); // то авторизовываем пользователя и записываем ему куку если опция выбрана
        }
        return false;
    }

    /**
     * Finds user by [[username]]
     *
     * @return User|null
     */
    public function getUser() //
    {
        if ($this->_user === false) { // проверяет найден ли пользователь
            $this->_user = User::findByUsername($this->username); // ишим пользователя если он не найден
        }

        return $this->_user; // возвращаем пользователя или false
    }
}
