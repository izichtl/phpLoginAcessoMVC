<?php

$validate =new Classes\ClassValidate();
$validate->validateFields($_POST);
$validate->validateEmail($email);
$validate->validateIssetEmail($email);
$validate->validateData($dataNascimento);
$validate->validateConfSenha($senha, $senhaConfi);
//$validate->validateStrongSenha($senha);
echo $validate->validateFinalCad($arrCadastro);
#$validate->validateCaptcha($recaptchaToken);



