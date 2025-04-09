# Laravel BloodGroup Package

A simple and reusable package for managing blood groups in Laravel applications.

## Features
- Easily manage blood groups with relations.
- Reusable code for any Laravel app with blood group management.
- Dynamically handle blood group assignments for models.
- Supports multiple models linked to a single blood group.

## Installation

1. Install the package via Composer:

```bash
composer require laravel/bloodgroup-management
```
2. Publish the package's configuration file:

```bash
php artisan vendor:publish --provider="Tushar\BloodGroup\BloodGroupServiceProvider" --tag="config"
```
3. The configuration file will be published to config/bloodgroup.php.


## Configuration

In the config/bloodgroup.php file, you need to define the models that will be linked to the blood group. For example:

```php
// config/bloodgroup.php

// Use the models that must have a "blood_group_id" field
return [
    'models' => [
        'user' => App\Models\User::class,
        'patient' => App\Models\Patient::class,
    ],
];

```
Here, we specify that User and Patient models are related to the BloodGroup model through the blood_group_id foreign key.

Customizing the Models
You can add as many models as you need to the models array in config/bloodgroup.php.

The key used for each model should be lowercase (e.g., 'user', 'patient'), and it will be used for dynamic relationships like users and patients in your code.

Usage
Using the HasBloodGroup Trait:

Add the HasBloodGroup trait to any model that should have a blood group. For example, in the User model:

```php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Tushar\BloodGroup\Traits\HasBloodGroup;

class User extends Model
{
    use HasBloodGroup;

    // Other model code
}
```
Working with Blood Groups:

You can now interact with the blood group like this:

```php
// Assigning a blood group by name
$user = User::find(1);
$user->bloodGroup = 'O+';

// Getting the blood group name
echo $user->bloodGroup; // O+

// Removing the blood group
$user->removeBloodGroup();

```
Dynamic Relations:

You can access models related to blood groups dynamically. For example, you can access all users with a particular blood group:

```php
$users = BloodGroup::where('name', 'O+')->first()->users; // Assuming 'O+' blood group exists
```
Similarly, you can define additional relationships for other models in your config/bloodgroup.php.

Example Configuration File: config/bloodgroup.php
Here’s a sample configuration for managing multiple models:

```php
// config/bloodgroup.php

return [
    // The models array where we define all models related to the blood group
    'models' => [
        'user' => App\Models\User::class,     // User model
        'patient' => App\Models\Patient::class, // Patient model
        'donor' => App\Models\Donor::class,    // Donor model (if needed)
    ],
];
```
## Additional Features
### Validation:
> Blood group names are validated for standard blood group types (e.g., A+, B-, O+).

### Dynamic Scopes:
> You can use scopes such as whereBloodGroup to filter models by their blood group.

### License
> This package is open-sourced software licensed under the MIT license.

### Credits
> Kawsar Ahmed - Author and Maintainer

```
এটি রিড মি ফাইলের একটি আপডেটেড সংস্করণ যা কনফিগারেশন এবং ব্যবহার সম্পর্কিত সমস্ত বিবরণ অন্তর্ভুক্ত করে। এতে কীভাবে কনফিগারেশন ফাইল তৈরি করবেন, কীভাবে মডেল সম্পর্কিত ডাইনামিক রিলেশন ব্যবহার করবেন, এবং অন্যান্য গুরুত্বপূর্ণ তথ্য রয়েছে।
```