WARNING!
THIS PROJECT IS NOT MAINTAINED ANYMORE
USE WITH YOUR OWN RISK

yii-user-profilepic
===================

This is Yii-User Profile Picture Widget. It will add new Widget option in Yii-User Profile Field

Requirements
------------

You should install following module and extension before installing this widget.
- Yii-User (obviously)
- EPhpThumb

Installation
------------

1. Install [Yii-User] (http://www.yiiframework.com/extension/yii-user) and [EPhpThumb] (http://www.yiiframework.com/extension/ephpthumb/)
2. Extract widget to `modules/user/components`. Your directory should look like this:
<pre>
   ~ components
     ~ UWprofilepic [folder]
     ~ UWprofilepic.php
     ~ ...
</pre>

3. Add following code to `modules/user/controllers/ProfileController.php` in function `actionEdit()` 
```
  public function actionEdit()
	{
		$model = $this->loadUser();
		$profile=$model->profile;
		
		//add this code:
		UWprofilepic::handleProfilePic($model,$profile);	
```

4. Add following code to `modules/user/controllers/RegistrationController.php` in function `actionRegistration()`
```
	public function actionRegistration() {
		$model = new RegistrationForm;
		$profile=new Profile;
		$profile->regMode = true;
		
		//add this code:
		UWprofilepic::handleProfilePic($model,$profile);
```

5. Login using admin account, and Create Profile Field
6. Select `VARCHAR` type, and choose Profile Picture Widget.
7. Click on Widget Parameters, then save.
8. Have fun.
