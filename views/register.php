<?php
$form = \app\core\Form\Form::begin('','post');?>
<div class="row">
    <div class="col"><?php echo $form->field($model,'firstname');?></div>
    <div class="col"><?php echo $form->field($model,'lastname');?></div>
</div>
<?php echo $form->field($model,'email');?>
<?php echo $form->field($model,'password')->passwordField();?>
<?php echo $form->field($model,'confirmPassword')->passwordField();?>
<button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
<?php \app\core\Form\Form::end();
?>
<!--<form method="post">-->
<!--    <img class="mb-4" src="../assets/brand/bootstrap-logo.svg" alt="" width="72" height="57">-->
<!--    <h1 class="h3 mb-3 fw-normal">Please sign in</h1>-->
<!--    <div class="row">-->
<!--    <div class="form-floating col-6">-->
<!--        <input type="text" class="form-control  --><?php //echo $model->hasError('firstname') ? 'is-invalid' : ''?><!--" name='firstname' value="--><?php //echo $model->firstname ?><!--" id="fname" placeholder="First Name">-->
<!--        <label for="fname">First Name</label>-->
<!--        <div class="invalid-feedback">-->
<!--        --><?php //echo $model->getFirstError("firstname");?>
<!--        </div>-->
<!--    </div>-->
<!--    <div class="form-floating col-6">-->
<!--        <input type="text" class="form-control --><?php //echo $model->hasError('lastname') ? 'is-invalid' : ''?><!--" name="lastname" value="--><?php //echo $model->lastname ?><!--"  id="lname" placeholder="Last name">-->
<!--        <label for="lname">Last Name</label>-->
<!--        <div class="invalid-feedback">-->
<!--            Please provide a valid city.-->
<!--        </div>-->
<!--    </div>-->
<!--    </div>-->
<!--    <div class="form-floating">-->
<!--        <input type="email" class="form-control --><?php //echo $model->hasError('email') ? 'is-invalid' : ''?><!--" id="floatingInput" value="--><?php //echo $model->email ?><!--"  name="email" placeholder="name@example.com">-->
<!--        <label for="floatingInput">Email address</label>-->
<!--        <div class="invalid-feedback">-->
<!--            Please provide a valid city.-->
<!--        </div>-->
<!--    </div>-->
<!--    <div class="form-floating">-->
<!--        <input type="password" class="form-control --><?php //echo $model->hasError('password') ? 'is-invalid' : ''?><!--" name="password" id="floatingPassword" placeholder="Password">-->
<!--        <label for="floatingPassword">Password</label>-->
<!--        <div class="invalid-feedback">-->
<!--            Please provide a valid city.-->
<!--        </div>-->
<!--    </div>-->
<!--    <div class="form-floating">-->
<!--        <input type="password" class="form-control --><?php //echo $model->hasError('confirmPassword') ? 'is-invalid' : ''?><!--" name="confirmPassword" id="floatingPassword" placeholder="Confirm Password">-->
<!--        <label for="floatingPassword">Password</label>-->
<!--        <div class="invalid-feedback">-->
<!--            Please provide a valid city.-->
<!--        </div>-->
<!--    </div>-->
<!---->
<!--    <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>-->
<!--    <p class="mt-5 mb-3 text-muted">&copy; 2017–2021</p>-->
<!--</form>-->