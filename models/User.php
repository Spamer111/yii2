<?php

namespace app\models;
use yii\db\ActiveRecord;

class User extends ActiveRecord  implements \yii\web\IdentityInterface
{

    public static function tableName(){
        return 'user';
    }

    /**
     * @inheritdoc
     */
    public static function findIdentity($id){
        return static::findOne($id); // возвращает пользователя из бд по его id
    }

    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null) { // обязаны обьявить но репализация в данном случае не нужна

    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username) // поиск пользователя нужного
    {
        return static::findOne(['username' => $username]); // возыращает пользователя у которого в бд username = $username(то что польщователь ввел через форму)
    }

    /**
     * @inheritdoc
     */
    public function getId() // получаем id пользлватея
    {
        return $this->id;
    }

    /**
     * @inheritdoc
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
        return $this->auth_key === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        //return $this->password === $password; // сравнивает пароль что ввл пользователь с тем что в бд
        return \Yii::$app->security->validatePassword($password, $this->password); // сравнивает пароль что ввл пользователь с тем что в бд + хеширование
    }

    public function generateAuthKey(){ // генерирует случайную куку для записи ее в бд для повторной авторизации
        $this->auth_key = \Yii::$app->security->generateRandomString();

    }

}
