<?php

class Login extends Model {

    public function validate() {
        $errors = [];

        if(!$this->email) {
            $errors['email'] = 'Email is a required field.';
        }

        if(!$this->password) {
            $errors['password'] = 'please, enter your password.';
        }

        if(count($errors) > 0) {
            throw new ValidationException($errors);
        }
    }
    
    public function checkLogin() {
        $this->validate();
        $user = User::getOne(['email' => $this->email]);
        if($user) {
            if($user->end_date) {
                throw new AppException('User Was fired from the company');
            }
            if(password_verify($this->password, $user->password)) {
                return $user;
            }
        }
        throw new AppException('Incorrect user/login');
    }
}