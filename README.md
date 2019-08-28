## Laravel Soundboard
#### An open source Laravel Soundboard with Admin Panel CRUD (Create Read Update Delete) built on [Laravel](http://laravel.com/) 5.8, [Bootstrap](http://getbootstrap.com) 4, [Vue.js](https://vuejs.org/), [BootstrapVue](https://bootstrap-vue.js.org/), and [Argon Dashboard](https://www.creative-tim.com/product/argon-dashboard-laravel)

[![Build Status](https://travis-ci.org/jeremykenedy/laravel-soundboard.svg?branch=master)](https://travis-ci.org/jeremykenedy/laravel-soundboard)
[![StyleCI](https://github.styleci.io/repos/201704305/shield?branch=master)](https://github.styleci.io/repos/201704305)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/jeremykenedy/laravel-soundboard/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/jeremykenedy/laravel-soundboard/?branch=master)
[![Build Status](https://scrutinizer-ci.com/g/jeremykenedy/laravel-soundboard/badges/build.png?b=master)](https://scrutinizer-ci.com/g/jeremykenedy/laravel-soundboard/build-status/master)
[![Code Intelligence Status](https://scrutinizer-ci.com/g/jeremykenedy/laravel-soundboard/badges/code-intelligence.svg?b=master)](https://scrutinizer-ci.com/code-intelligence)
[![MadeWithLaravel.com shield](https://madewithlaravel.com/storage/repo-shields/1699-shield.svg)](https://madewithlaravel.com/p/laravel-soundboard/shield-link)
[![License: MIT](https://img.shields.io/badge/License-MIT-yellow.svg)](https://opensource.org/licenses/MIT)

#### Table of contents
- [Features](#features)
- [Installation Instructions](#installation-instructions)
    - [Build the Front End Assets with Webpack](#build-the-front-end-assets-with-webpack)
- [Seeds](#seeds)
    - [Seeded Roles](#seeded-roles)
    - [Seeded Permissions](#seeded-permissions)
    - [Seeded Users](#seeded-users)
    - [Themes Seed List](#themes-seed-list)
- [Commands](#commands)
    - [Generate Site Map](#generate-site-map)
- [Configs](#configs)
    - [Config File](#config-file)
    - [Env Variables](#env-variables)
    - [Language Files](#language-files)
- [Routes](#routes)
- [Screenshots](#screenshots)
- [File Tree](#file-tree)
- [Opening an Issue](#opening-an-issue)
- [License](#license)

### Features
| Laravel Soundboard Features |
| :------------ |
|Built on [Laravel](http://laravel.com/) 5.8|
|Built on [Bootstrap](https://getbootstrap.com/) 4|
|Front End Built on [Vue.js](https://vuejs.org/) and [BootstrapVue](https://bootstrap-vue.js.org/)|
|Admin Built on [Argon Dashboard Laravel](https://www.creative-tim.com/product/argon-dashboard-laravel) |
|Uses [webpack.js](https://webpack.js.org) and [eslint](https://eslint.org/)|
|Uses [MySQL](https://github.com/mysql) Database (can be changed)|
|Uses [Artisan](http://laravel.com/docs/5.8/artisan) to manage database migration, schema creations, and create/publish page controller templates|
|Dependencies are managed with [COMPOSER](https://getcomposer.org/)|
|CRUD (Create, Read, Update, Delete) User Management|
|CRUD (Create, Read, Update, Delete) Sound Files|
|Makes use of [Language Localization Files](https://laravel.com/docs/5.8/localization)|
|Active Nav states using [Laravel Requests](https://laravel.com/docs/5.8/requests)|
|User [Roles/ACL Implementation](https://github.com/jeremykenedy/laravel-roles)|
|Admin PHP Information UI using [Laravel PHP Info](https://github.com/jeremykenedy/laravel-phpinfo) Package|
|Activity Logging using [Laravel-logger](https://github.com/jeremykenedy/laravel-logger)|
|Email Error Handling with [laravel-exception-notifier](https://github.com/jeremykenedy/laravel-exception-notifier)|
|Front-end bootstrap themes with admin management panel [from Bootswatch](https://bootswatch.com/)|
|Pull Built in sounds files from [Git Repository](https://github.com/jeremykenedy/laravel-soundboard/blob/master/.env.example#L66)|
|Admin uses email address based by [Gravatar by Creativeorange](https://github.com/creativeorange/gravatar) |

### Installation Instructions
1. Run `git clone https://github.com/jeremykenedy/laravel-soundboard.git laravel-soundboard`
2. Create a MySQL database for the project
    * ```mysql -u root -p```, if using Vagrant: ```mysql -u homestead -psecret```
    * ```create database soundboard;```
    * ```\q```
3. From the projects root run `cp .env.example .env`
4. Configure your `.env` file
5. Run `composer install` from the projects root folder
6. Generate Application key from the projects root folder by running:
```
php artisan key:generate
```
7. Pull in seeded sound files from the projects root folder by running:
```
php artisan get-sounds
```
8. From the projects root folder run `php artisan key:generate`
9. From the projects root folder run `php artisan migrate`
10. From the projects root folder run `composer dump-autoload`
11. From the projects root folder run `php artisan db:seed`
12. Compile the front end assets with [npm steps](#using-npm) or [yarn steps](#using-yarn).

#### Build the Front End Assets with Webpack
##### Using NPM:
1. From the projects root folder run `npm install`
2. From the projects root folder run `npm run dev` or `npm run production`
  * You can watch assets with `npm run watch`

##### Using Yarn:
1. From the projects root folder run `yarn install`
2. From the projects root folder run `yarn run dev` or `yarn run production`
  * You can watch assets with `yarn run watch`

###### And thats it with the caveat of setting up and configuring your development environment. I recommend [Laravel Homestead](https://laravel.com/docs/5.8/homestead)

### Seeds
* [DatabaseSeeder.php](https://github.com/jeremykenedy/laravel-soundboard/blob/master/database/seeds/DatabaseSeeder.php)
* [PermissionsTableSeeder.php](https://github.com/jeremykenedy/laravel-soundboard/blob/master/database/seeds/PermissionsTableSeeder.php)
* [RolesTableSeeder.php](https://github.com/jeremykenedy/laravel-soundboard/blob/master/database/seeds/RolesTableSeeder.php)
* [ConnectRelationshipsSeeder.php](https://github.com/jeremykenedy/laravel-soundboard/blob/master/database/seeds/ConnectRelationshipsSeeder.php)
* [SoundsTableSeeder.php](https://github.com/jeremykenedy/laravel-soundboard/blob/master/database/seeds/SoundsTableSeeder.php)
* [ThemesTableSeeder.php](https://github.com/jeremykenedy/laravel-soundboard/blob/master/database/seeds/ThemesTableSeeder.php)
* [SettingsTableSeeder.php](https://github.com/jeremykenedy/laravel-soundboard/blob/master/database/seeds/SettingsTableSeeder.php)
* [UsersTableSeeder.php](https://github.com/jeremykenedy/laravel-soundboard/blob/master/database/seeds/UsersTableSeeder.php)

##### Seeded Roles
| Role | Level |
| :------------ | :------------ |
|Unverified|Level 0|
|User|Level 1|
|Admin|Level 4|
|Super Admin|Level 5|

##### Seeded Permissions
| Name | Slug |
| :------------ | :------------ |
|Can View Users|view.users|
|Can Create Users|create.users|
|Can Edit Users|edit.users|
|Can Delete Users|delete.users|
|Super Admin Permissions|perms.super-admin|
|Admin Permissions|perms.admin|
|User Permissions|perms.use |

##### Seeded Users
|Email|Password|Access|Config|Status|
| :------------ | :------------ | :------------ | :------------ | :------------ |
|superadmin@superadmin.com|password|Super Admin Access|Seeded from [.env](https://github.com/jeremykenedy/laravel-soundboard/blob/master/.env.example)|Required|
|admin@admin.com|password|Super Admin Access|Seeded from [.env](https://github.com/jeremykenedy/laravel-soundboard/blob/master/.env.example)|Optional|
|user@user.com|password|User Access|Seeded from [.env](https://github.com/jeremykenedy/laravel-soundboard/blob/master/.env.example)|Optional|

* All Controlled by the `.env` file.

##### Themes Seed List
  * [ThemesTableSeeder](https://github.com/jeremykenedy/laravel-soundboard/blob/master/database/seeds/ThemesTableSeeder.php)

### Commands
#### Pull Seeded Sound Files
* You can pull in the seeded sound files from GitHub with the following Artisan Command:

`php artisan get-sounds`

### Configs
#### Config File
Here is a list of the custom config files that have been added or modified to the project:

* [laravel-logger.php](https://github.com/jeremykenedy/laravel-soundboard/blob/master/config/laravel-logger.php)
* [laravelPhpInfo.php](https://github.com/jeremykenedy/laravel-soundboard/blob/master/config/laravelPhpInfo.php)
* [roles.php](https://github.com/jeremykenedy/laravel-soundboard/blob/master/config/roles.php)
* [soundboard.php](https://github.com/jeremykenedy/laravel-soundboard/blob/master/config/soundboard.php)


#### Env Variables
Here is a list of the additonal added [`.env`](https://github.com/jeremykenedy/laravel-soundboard/blob/master/.env.example) variables:

```
INITIAL_SEEDED_SUPER_ADMIN_USERNAME='Super Admin'
INITIAL_SEEDED_SUPER_ADMIN_USEREMAIL='superadmin@superadmin.com'
INITIAL_SEEDED_SUPER_ADMIN_USERPASSWORD='password'

INITIAL_SEEDED_ADMIN_ENABLED=false
INITIAL_SEEDED_ADMIN_USERNAME='Admin'
INITIAL_SEEDED_ADMIN_USEREMAIL='admin@admin.com'
INITIAL_SEEDED_ADMIN_USERPASSWORD='password'

INITIAL_SEEDED_USER_ENABLED=false
INITIAL_SEEDED_USER_USERNAME='User'
INITIAL_SEEDED_USER_USEREMAIL='user@user.com'
INITIAL_SEEDED_USER_USERPASSWORD='password'

SOUNDBOARD_APP_NAME="${APP_NAME}"
SOUNDBOARD_DEFAULT_DESCRIPTION="SoundBoard is an open source soundboard built on Laravel and VueJS"
SOUNDBOARD_DEFAULT_AUTHOR="Jeremy Kenedy"
SOUNDBOARD_GOOGLEANALYTICSID=null
SOUNDBOARD_SOUNDS_REPO=https://github.com/jeremykenedy/jeremy-sound-board

# Roles Database Seeder Settings
ROLES_SEED_DEFAULT_PERMISSIONS=false
ROLES_SEED_DEFAULT_ROLES=false
ROLES_SEED_DEFAULT_RELATIONSHIPS=false
ROLES_SEED_DEFAULT_USERS=false

# Roles GUI Settings
ROLES_GUI_ENABLED=true
ROLES_GUI_MIDDLEWARE='role:super.admin'
ROLES_GUI_CREATE_ROLE_MIDDLEWARE_TYPE='super.admin'
ROLES_GUI_CREATE_PERMISSION_MIDDLEWARE_TYPE='super.admin'
ROLES_API_MIDDLEWARE='super.admin'
ROLES_API_CREATE_ROLE_MIDDLEWARE_TYPE='super.admin'
ROLES_API_CREATE_PERMISSION_MIDDLEWARE_TYPE='super.admin'
ROLES_GUI_BLADE_EXTENDED='layouts.app'

# Logger
LARAVEL_LOGGER_ROLES_MIDDLWARE=role:super.admin
LARAVEL_LOGGER_USER_MODEL=App\Models\User
LARAVEL_LOGGER_LOG_RECORD_FAILURES_TO_FILE=true
LARAVEL_LOGGER_FLASH_MESSAGE_BLADE_ENABLED=true
LARAVEL_LOGGER_LAYOUT=layouts.app
LARAVEL_LOGGER_BOOTSTRAP_VERSION=4
LARAVEL_LOGGER_BLADE_PLACEMENT_CSS=cs

# Error Emails
EMAIL_EXCEPTION_ENABLED=false
EMAIL_EXCEPTION_FROM="${MAIL_USERNAME}"
EMAIL_EXCEPTION_TO='email1@gmail.com, email2@gmail.com'
EMAIL_EXCEPTION_CC=''
EMAIL_EXCEPTION_BCC=''
EMAIL_EXCEPTION_SUBJECT='Error on laravel-soundboard'

# octocat
SOUNDBOARD_OCTOCAT_ENABLED=true

```

#### Language Files
* [admin.php](https://github.com/jeremykenedy/laravel-soundboard/blob/master/resources/lang/en/admin.php)
* [messages.php](https://github.com/jeremykenedy/laravel-soundboard/blob/master/resources/lang/en/messages.php)
* [soundboard.php](https://github.com/jeremykenedy/laravel-soundboard/blob/master/resources/lang/en/soundboard.php)
* [themes.php](https://github.com/jeremykenedy/laravel-soundboard/blob/master/resources/lang/en/themes.php)
* [laravel-logger.php](https://github.com/jeremykenedy/laravel-soundboard/blob/master/resources/lang/vendor/LaravelLogger/en/laravel-logger.php)
* [laravel-phpinfo.php](https://github.com/jeremykenedy/laravel-soundboard/blob/master/resources/lang/vendor/laravelPhpInfo/en/laravel-phpinfo.php)

### Routes

```
+--------+----------------------------------------+---------------------------------------------------------+-----------------------------------------------+-----------------------------------------------------------------------------------------------------------------+--------------------------------------------------------------------------------------------------------------------------+
| Domain | Method                                 | URI                                                     | Name                                          | Action                                                                                                          | Middleware                                                                                                               |
+--------+----------------------------------------+---------------------------------------------------------+-----------------------------------------------+-----------------------------------------------------------------------------------------------------------------+--------------------------------------------------------------------------------------------------------------------------+
|        | GET|HEAD                               | /                                                       | home                                          | App\Http\Controllers\FrontEndController@index                                                                   | web,activity                                                                                                             |
|        | GET|HEAD                               | activity                                                | activity                                      | jeremykenedy\LaravelLogger\App\Http\Controllers\LaravelLoggerController@showAccessLog                           | web,auth,activity                                                                                                        |
|        | DELETE                                 | activity/clear-activity                                 | clear-activity                                | jeremykenedy\LaravelLogger\App\Http\Controllers\LaravelLoggerController@clearActivityLog                        | web,auth,activity                                                                                                        |
|        | GET|HEAD                               | activity/cleared                                        | cleared                                       | jeremykenedy\LaravelLogger\App\Http\Controllers\LaravelLoggerController@showClearedActivityLog                  | web,auth,activity                                                                                                        |
|        | GET|HEAD                               | activity/cleared/log/{id}                               |                                               | jeremykenedy\LaravelLogger\App\Http\Controllers\LaravelLoggerController@showClearedAccessLogEntry               | web,auth,activity                                                                                                        |
|        | DELETE                                 | activity/destroy-activity                               | destroy-activity                              | jeremykenedy\LaravelLogger\App\Http\Controllers\LaravelLoggerController@destroyActivityLog                      | web,auth,activity                                                                                                        |
|        | GET|HEAD                               | activity/log/{id}                                       |                                               | jeremykenedy\LaravelLogger\App\Http\Controllers\LaravelLoggerController@showAccessLogEntry                      | web,auth,activity                                                                                                        |
|        | POST                                   | activity/restore-log                                    | restore-activity                              | jeremykenedy\LaravelLogger\App\Http\Controllers\LaravelLoggerController@restoreClearedActivityLog               | web,auth,activity                                                                                                        |
|        | GET|HEAD                               | admin                                                   | admin                                         | App\Http\Controllers\AdminController@index                                                                      | web,auth,permission:perms.user,activity                                                                                  |
|        | POST                                   | api/sound/delete/{id}                                   |                                               | App\Http\Controllers\Api\SoundsController@destroy                                                               | api,activity                                                                                                             |
|        | PATCH                                  | api/sound/updateEnabled/{id}                            |                                               | App\Http\Controllers\Api\SoundsController@updateEnabled                                                         | api,activity                                                                                                             |
|        | GET|HEAD                               | api/sounds                                              |                                               | App\Http\Controllers\Api\SoundsController@index                                                                 | api,activity                                                                                                             |
|        | PUT                                    | api/sounds/updateAll                                    |                                               | App\Http\Controllers\Api\SoundsController@updateAllSortOrder                                                    | api,activity                                                                                                             |
|        | GET|HEAD                               | laravel-filemanager                                     | unisharp.lfm.show                             | UniSharp\LaravelFilemanager\Controllers\LfmController@show                                                      | web,auth,\UniSharp\LaravelFilemanager\Middlewares\MultiUser,\UniSharp\LaravelFilemanager\Middlewares\CreateDefaultFolder |
|        | GET|HEAD                               | laravel-filemanager/crop                                | unisharp.lfm.getCrop                          | UniSharp\LaravelFilemanager\Controllers\CropController@getCrop                                                  | web,auth,\UniSharp\LaravelFilemanager\Middlewares\MultiUser,\UniSharp\LaravelFilemanager\Middlewares\CreateDefaultFolder |
|        | GET|HEAD                               | laravel-filemanager/cropimage                           | unisharp.lfm.getCropimage                     | UniSharp\LaravelFilemanager\Controllers\CropController@getCropimage                                             | web,auth,\UniSharp\LaravelFilemanager\Middlewares\MultiUser,\UniSharp\LaravelFilemanager\Middlewares\CreateDefaultFolder |
|        | GET|HEAD                               | laravel-filemanager/cropnewimage                        | unisharp.lfm.getCropimage                     | UniSharp\LaravelFilemanager\Controllers\CropController@getNewCropimage                                          | web,auth,\UniSharp\LaravelFilemanager\Middlewares\MultiUser,\UniSharp\LaravelFilemanager\Middlewares\CreateDefaultFolder |
|        | GET|HEAD                               | laravel-filemanager/delete                              | unisharp.lfm.getDelete                        | UniSharp\LaravelFilemanager\Controllers\DeleteController@getDelete                                              | web,auth,\UniSharp\LaravelFilemanager\Middlewares\MultiUser,\UniSharp\LaravelFilemanager\Middlewares\CreateDefaultFolder |
|        | GET|HEAD                               | laravel-filemanager/deletefolder                        | unisharp.lfm.getDeletefolder                  | UniSharp\LaravelFilemanager\Controllers\FolderController@getDeletefolder                                        | web,auth,\UniSharp\LaravelFilemanager\Middlewares\MultiUser,\UniSharp\LaravelFilemanager\Middlewares\CreateDefaultFolder |
|        | GET|HEAD                               | laravel-filemanager/doresize                            | unisharp.lfm.performResize                    | UniSharp\LaravelFilemanager\Controllers\ResizeController@performResize                                          | web,auth,\UniSharp\LaravelFilemanager\Middlewares\MultiUser,\UniSharp\LaravelFilemanager\Middlewares\CreateDefaultFolder |
|        | GET|HEAD                               | laravel-filemanager/download                            | unisharp.lfm.getDownload                      | UniSharp\LaravelFilemanager\Controllers\DownloadController@getDownload                                          | web,auth,\UniSharp\LaravelFilemanager\Middlewares\MultiUser,\UniSharp\LaravelFilemanager\Middlewares\CreateDefaultFolder |
|        | GET|HEAD                               | laravel-filemanager/errors                              | unisharp.lfm.getErrors                        | UniSharp\LaravelFilemanager\Controllers\LfmController@getErrors                                                 | web,auth,\UniSharp\LaravelFilemanager\Middlewares\MultiUser,\UniSharp\LaravelFilemanager\Middlewares\CreateDefaultFolder |
|        | GET|HEAD                               | laravel-filemanager/folders                             | unisharp.lfm.getFolders                       | UniSharp\LaravelFilemanager\Controllers\FolderController@getFolders                                             | web,auth,\UniSharp\LaravelFilemanager\Middlewares\MultiUser,\UniSharp\LaravelFilemanager\Middlewares\CreateDefaultFolder |
|        | GET|HEAD                               | laravel-filemanager/jsonitems                           | unisharp.lfm.getItems                         | UniSharp\LaravelFilemanager\Controllers\ItemsController@getItems                                                | web,auth,\UniSharp\LaravelFilemanager\Middlewares\MultiUser,\UniSharp\LaravelFilemanager\Middlewares\CreateDefaultFolder |
|        | GET|HEAD                               | laravel-filemanager/newfolder                           | unisharp.lfm.getAddfolder                     | UniSharp\LaravelFilemanager\Controllers\FolderController@getAddfolder                                           | web,auth,\UniSharp\LaravelFilemanager\Middlewares\MultiUser,\UniSharp\LaravelFilemanager\Middlewares\CreateDefaultFolder |
|        | GET|HEAD                               | laravel-filemanager/photos/{base_path}/{image_name}     | unisharp.lfm.                                 | UniSharp\LaravelFilemanager\Controllers\RedirectController@getImage                                             |                                                                                                                          |
|        | GET|HEAD                               | laravel-filemanager/rename                              | unisharp.lfm.getRename                        | UniSharp\LaravelFilemanager\Controllers\RenameController@getRename                                              | web,auth,\UniSharp\LaravelFilemanager\Middlewares\MultiUser,\UniSharp\LaravelFilemanager\Middlewares\CreateDefaultFolder |
|        | GET|HEAD                               | laravel-filemanager/resize                              | unisharp.lfm.getResize                        | UniSharp\LaravelFilemanager\Controllers\ResizeController@getResize                                              | web,auth,\UniSharp\LaravelFilemanager\Middlewares\MultiUser,\UniSharp\LaravelFilemanager\Middlewares\CreateDefaultFolder |
|        | GET|HEAD                               | laravel-filemanager/sound-files/{base_path}/{file_name} | unisharp.lfm.                                 | UniSharp\LaravelFilemanager\Controllers\RedirectController@getFile                                              |                                                                                                                          |
|        | GET|HEAD|POST|PUT|PATCH|DELETE|OPTIONS | laravel-filemanager/upload                              | unisharp.lfm.upload                           | UniSharp\LaravelFilemanager\Controllers\UploadController@upload                                                 | web,auth,\UniSharp\LaravelFilemanager\Middlewares\MultiUser,\UniSharp\LaravelFilemanager\Middlewares\CreateDefaultFolder |
|        | POST                                   | login                                                   |                                               | App\Http\Controllers\Auth\LoginController@login                                                                 | web,activity,guest                                                                                                       |
|        | GET|HEAD                               | login                                                   | login                                         | App\Http\Controllers\Auth\LoginController@showLoginForm                                                         | web,activity,guest                                                                                                       |
|        | POST                                   | logout                                                  | logout                                        | App\Http\Controllers\Auth\LoginController@logout                                                                | web,activity                                                                                                             |
|        | POST                                   | password/email                                          | password.email                                | App\Http\Controllers\Auth\ForgotPasswordController@sendResetLinkEmail                                           | web,activity,guest                                                                                                       |
|        | GET|HEAD                               | password/reset                                          | password.request                              | App\Http\Controllers\Auth\ForgotPasswordController@showLinkRequestForm                                          | web,activity,guest                                                                                                       |
|        | POST                                   | password/reset                                          | password.update                               | App\Http\Controllers\Auth\ResetPasswordController@reset                                                         | web,activity,guest                                                                                                       |
|        | GET|HEAD                               | password/reset/{token}                                  | password.reset                                | App\Http\Controllers\Auth\ResetPasswordController@showResetForm                                                 | web,activity,guest                                                                                                       |
|        | GET|HEAD                               | permission-deleted/{id}                                 | laravelroles::permission-show-deleted         | jeremykenedy\LaravelRoles\App\Http\Controllers\LaravelpermissionsDeletedController@show                         | web,auth,role:super.admin                                                                                                |
|        | DELETE                                 | permission-destroy/{id}                                 | laravelroles::permission-item-destroy         | jeremykenedy\LaravelRoles\App\Http\Controllers\LaravelpermissionsDeletedController@destroy                      | web,auth,role:super.admin                                                                                                |
|        | PUT                                    | permission-restore/{id}                                 | laravelroles::permission-restore              | jeremykenedy\LaravelRoles\App\Http\Controllers\LaravelpermissionsDeletedController@restorePermission            | web,auth,role:super.admin                                                                                                |
|        | POST                                   | permissions                                             | laravelroles::permissions.store               | jeremykenedy\LaravelRoles\App\Http\Controllers\LaravelPermissionsController@store                               | web,auth,role:super.admin                                                                                                |
|        | GET|HEAD                               | permissions                                             | laravelroles::permissions.index               | jeremykenedy\LaravelRoles\App\Http\Controllers\LaravelPermissionsController@index                               | web,auth,role:super.admin                                                                                                |
|        | GET|HEAD                               | permissions-deleted                                     | laravelroles::permissions-deleted             | jeremykenedy\LaravelRoles\App\Http\Controllers\LaravelpermissionsDeletedController@index                        | web,auth,role:super.admin                                                                                                |
|        | DELETE                                 | permissions-deleted-destroy-all                         | laravelroles::destroy-all-deleted-permissions | jeremykenedy\LaravelRoles\App\Http\Controllers\LaravelpermissionsDeletedController@destroyAllDeletedPermissions | web,auth,role:super.admin                                                                                                |
|        | POST                                   | permissions-deleted-restore-all                         | laravelroles::permissions-deleted-restore-all | jeremykenedy\LaravelRoles\App\Http\Controllers\LaravelpermissionsDeletedController@restoreAllDeletedPermissions | web,auth,role:super.admin                                                                                                |
|        | GET|HEAD                               | permissions/create                                      | laravelroles::permissions.create              | jeremykenedy\LaravelRoles\App\Http\Controllers\LaravelPermissionsController@create                              | web,auth,role:super.admin                                                                                                |
|        | DELETE                                 | permissions/{permission}                                | laravelroles::permissions.destroy             | jeremykenedy\LaravelRoles\App\Http\Controllers\LaravelPermissionsController@destroy                             | web,auth,role:super.admin                                                                                                |
|        | PUT|PATCH                              | permissions/{permission}                                | laravelroles::permissions.update              | jeremykenedy\LaravelRoles\App\Http\Controllers\LaravelPermissionsController@update                              | web,auth,role:super.admin                                                                                                |
|        | GET|HEAD                               | permissions/{permission}                                | laravelroles::permissions.show                | jeremykenedy\LaravelRoles\App\Http\Controllers\LaravelPermissionsController@show                                | web,auth,role:super.admin                                                                                                |
|        | GET|HEAD                               | permissions/{permission}/edit                           | laravelroles::permissions.edit                | jeremykenedy\LaravelRoles\App\Http\Controllers\LaravelPermissionsController@edit                                | web,auth,role:super.admin                                                                                                |
|        | GET|HEAD                               | phpinfo                                                 | laravelPhpInfo::phpinfo                       | jeremykenedy\LaravelPhpInfo\App\Http\Controllers\LaravelPhpInfoController@phpinfo                               | web,auth,role:super.admin                                                                                                |
|        | GET|HEAD                               | profile                                                 | profile.edit                                  | App\Http\Controllers\ProfileController@edit                                                                     | web,auth,permission:perms.user,activity                                                                                  |
|        | PUT                                    | profile                                                 | profile.update                                | App\Http\Controllers\ProfileController@update                                                                   | web,auth,permission:perms.user,activity                                                                                  |
|        | PUT                                    | profile/password                                        | profile.password                              | App\Http\Controllers\ProfileController@password                                                                 | web,auth,permission:perms.user,activity                                                                                  |
|        | POST                                   | register                                                |                                               | App\Http\Controllers\Auth\RegisterController@register                                                           | web,activity,guest                                                                                                       |
|        | GET|HEAD                               | register                                                | register                                      | App\Http\Controllers\Auth\RegisterController@showRegistrationForm                                               | web,activity,guest                                                                                                       |
|        | GET|HEAD                               | role-deleted/{id}                                       | laravelroles::role-show-deleted               | jeremykenedy\LaravelRoles\App\Http\Controllers\LaravelRolesDeletedController@show                               | web,auth,role:super.admin                                                                                                |
|        | DELETE                                 | role-destroy/{id}                                       | laravelroles::role-item-destroy               | jeremykenedy\LaravelRoles\App\Http\Controllers\LaravelRolesDeletedController@destroy                            | web,auth,role:super.admin                                                                                                |
|        | PUT                                    | role-restore/{id}                                       | laravelroles::role-restore                    | jeremykenedy\LaravelRoles\App\Http\Controllers\LaravelRolesDeletedController@restoreRole                        | web,auth,role:super.admin                                                                                                |
|        | POST                                   | roles                                                   | laravelroles::roles.store                     | jeremykenedy\LaravelRoles\App\Http\Controllers\LaravelRolesController@store                                     | web,auth,role:super.admin                                                                                                |
|        | GET|HEAD                               | roles                                                   | laravelroles::roles.index                     | jeremykenedy\LaravelRoles\App\Http\Controllers\LaravelRolesController@index                                     | web,auth,role:super.admin                                                                                                |
|        | GET|HEAD                               | roles-deleted                                           | laravelroles::roles-deleted                   | jeremykenedy\LaravelRoles\App\Http\Controllers\LaravelRolesDeletedController@index                              | web,auth,role:super.admin                                                                                                |
|        | DELETE                                 | roles-deleted-destroy-all                               | laravelroles::destroy-all-deleted-roles       | jeremykenedy\LaravelRoles\App\Http\Controllers\LaravelRolesDeletedController@destroyAllDeletedRoles             | web,auth,role:super.admin                                                                                                |
|        | POST                                   | roles-deleted-restore-all                               | laravelroles::roles-deleted-restore-all       | jeremykenedy\LaravelRoles\App\Http\Controllers\LaravelRolesDeletedController@restoreAllDeletedRoles             | web,auth,role:super.admin                                                                                                |
|        | GET|HEAD                               | roles/create                                            | laravelroles::roles.create                    | jeremykenedy\LaravelRoles\App\Http\Controllers\LaravelRolesController@create                                    | web,auth,role:super.admin                                                                                                |
|        | GET|HEAD                               | roles/{role}                                            | laravelroles::roles.show                      | jeremykenedy\LaravelRoles\App\Http\Controllers\LaravelRolesController@show                                      | web,auth,role:super.admin                                                                                                |
|        | PUT|PATCH                              | roles/{role}                                            | laravelroles::roles.update                    | jeremykenedy\LaravelRoles\App\Http\Controllers\LaravelRolesController@update                                    | web,auth,role:super.admin                                                                                                |
|        | DELETE                                 | roles/{role}                                            | laravelroles::roles.destroy                   | jeremykenedy\LaravelRoles\App\Http\Controllers\LaravelRolesController@destroy                                   | web,auth,role:super.admin                                                                                                |
|        | GET|HEAD                               | roles/{role}/edit                                       | laravelroles::roles.edit                      | jeremykenedy\LaravelRoles\App\Http\Controllers\LaravelRolesController@edit                                      | web,auth,role:super.admin                                                                                                |
|        | GET|HEAD                               | sounds                                                  | sounds                                        | App\Http\Controllers\SoundsController@index                                                                     | web,auth,permission:perms.admin,activity                                                                                 |
|        | POST                                   | sounds                                                  | storesound                                    | App\Http\Controllers\SoundsController@store                                                                     | web,auth,permission:perms.admin,activity                                                                                 |
|        | GET|HEAD                               | sounds/create                                           | createsound                                   | App\Http\Controllers\SoundsController@create                                                                    | web,auth,permission:perms.admin,activity                                                                                 |
|        | DELETE                                 | sounds/{sound}                                          | sounds.destroy                                | App\Http\Controllers\SoundsController@destroy                                                                   | web,auth,permission:perms.admin,activity                                                                                 |
|        | PUT|PATCH                              | sounds/{sound}                                          | updatesound                                   | App\Http\Controllers\SoundsController@update                                                                    | web,auth,permission:perms.admin,activity                                                                                 |
|        | GET|HEAD                               | sounds/{sound}                                          | showsound                                     | App\Http\Controllers\SoundsController@show                                                                      | web,auth,permission:perms.admin,activity                                                                                 |
|        | GET|HEAD                               | sounds/{sound}/edit                                     | editsound                                     | App\Http\Controllers\SoundsController@edit                                                                      | web,auth,permission:perms.admin,activity                                                                                 |
|        | GET|HEAD                               | themes                                                  | themes                                        | App\Http\Controllers\ThemesManagementController@index                                                           | web,auth,permission:perms.admin,activity                                                                                 |
|        | POST                                   | themes                                                  | storetheme                                    | App\Http\Controllers\ThemesManagementController@store                                                           | web,auth,permission:perms.admin,activity                                                                                 |
|        | GET|HEAD                               | themes/create                                           | createtheme                                   | App\Http\Controllers\ThemesManagementController@create                                                          | web,auth,permission:perms.admin,activity                                                                                 |
|        | DELETE                                 | themes/{theme}                                          | destroytheme                                  | App\Http\Controllers\ThemesManagementController@destroy                                                         | web,auth,permission:perms.admin,activity                                                                                 |
|        | PUT|PATCH                              | themes/{theme}                                          | updatetheme                                   | App\Http\Controllers\ThemesManagementController@update                                                          | web,auth,permission:perms.admin,activity                                                                                 |
|        | GET|HEAD                               | themes/{theme}                                          | showtheme                                     | App\Http\Controllers\ThemesManagementController@show                                                            | web,auth,permission:perms.admin,activity                                                                                 |
|        | GET|HEAD                               | themes/{theme}/edit                                     | edittheme                                     | App\Http\Controllers\ThemesManagementController@edit                                                            | web,auth,permission:perms.admin,activity                                                                                 |
|        | POST                                   | update-theme                                            | update-theme                                  | App\Http\Controllers\ThemesManagementController@updateDefaultTheme                                              | web,auth,permission:perms.admin,activity                                                                                 |
|        | POST                                   | user                                                    | user.store                                    | App\Http\Controllers\UserController@store                                                                       | web,auth,permission:perms.super.admin,activity                                                                           |
|        | GET|HEAD                               | user                                                    | user.index                                    | App\Http\Controllers\UserController@index                                                                       | web,auth,permission:perms.super.admin,activity                                                                           |
|        | GET|HEAD                               | user/create                                             | user.create                                   | App\Http\Controllers\UserController@create                                                                      | web,auth,permission:perms.super.admin,activity                                                                           |
|        | DELETE                                 | user/{user}                                             | user.destroy                                  | App\Http\Controllers\UserController@destroy                                                                     | web,auth,permission:perms.super.admin,activity                                                                           |
|        | PUT|PATCH                              | user/{user}                                             | user.update                                   | App\Http\Controllers\UserController@update                                                                      | web,auth,permission:perms.super.admin,activity                                                                           |
|        | GET|HEAD                               | user/{user}/edit                                        | user.edit                                     | App\Http\Controllers\UserController@edit                                                                        | web,auth,permission:perms.super.admin,activity                                                                           |
+--------+----------------------------------------+---------------------------------------------------------+-----------------------------------------------+-----------------------------------------------------------------------------------------------------------------+--------------------------------------------------------------------------------------------------------------------------+

```

### Screenshots
![Homepage](https://github-project-images.s3-us-west-2.amazonaws.com/laravel-soundboard/1-home.jpg)
![Admin Dashboard](https://github-project-images.s3-us-west-2.amazonaws.com/laravel-soundboard/2-admin-dashboard.jpg)
![Admin Sounds](https://github-project-images.s3-us-west-2.amazonaws.com/laravel-soundboard/3-sounds.jpg)
![Admin Themes](https://github-project-images.s3-us-west-2.amazonaws.com/laravel-soundboard/4-themes.jpg)
![Admin Users](https://github-project-images.s3-us-west-2.amazonaws.com/laravel-soundboard/5-users.jpg)
![Admin Roles](https://github-project-images.s3-us-west-2.amazonaws.com/laravel-soundboard/6-roles.jpg)
![Admin Activity](https://github-project-images.s3-us-west-2.amazonaws.com/laravel-soundboard/7-activity.jpg)
![Admin PHP Info](https://github-project-images.s3-us-west-2.amazonaws.com/laravel-soundboard/8-phpinfo.jpg)

### File Tree

```
laravel-soundboard
├── .editorconfig
├── .env.example
├── .env.travis
├── .eslintrc.js
├── .gitattributes
├── .gitignore
├── .travis.yml
├── LICENSE
├── README.md
├── app
│   ├── Console
│   │   ├── Commands
│   │   │   └── GetSoundFiles.php
│   │   └── Kernel.php
│   ├── Exceptions
│   │   └── Handler.php
│   ├── Http
│   │   ├── Controllers
│   │   │   ├── AdminController.php
│   │   │   ├── Api
│   │   │   │   └── SoundsController.php
│   │   │   ├── Auth
│   │   │   │   ├── ForgotPasswordController.php
│   │   │   │   ├── LoginController.php
│   │   │   │   ├── RegisterController.php
│   │   │   │   ├── ResetPasswordController.php
│   │   │   │   └── VerificationController.php
│   │   │   ├── Controller.php
│   │   │   ├── FrontEndController.php
│   │   │   ├── ProfileController.php
│   │   │   ├── SoundsController.php
│   │   │   ├── ThemesManagementController.php
│   │   │   └── UserController.php
│   │   ├── Kernel.php
│   │   ├── Middleware
│   │   │   ├── Authenticate.php
│   │   │   ├── CheckForMaintenanceMode.php
│   │   │   ├── EncryptCookies.php
│   │   │   ├── RedirectIfAuthenticated.php
│   │   │   ├── TrimStrings.php
│   │   │   ├── TrustProxies.php
│   │   │   └── VerifyCsrfToken.php
│   │   ├── Requests
│   │   │   ├── DeleteThemeRequest.php
│   │   │   ├── EditSoundRequest.php
│   │   │   ├── PasswordRequest.php
│   │   │   ├── ProfileRequest.php
│   │   │   ├── SoundAdminRequest.php
│   │   │   ├── SoundRequest.php
│   │   │   ├── StoreThemeRequest.php
│   │   │   ├── ThemeRequest.php
│   │   │   ├── UpdateThemeRequest.php
│   │   │   └── UserRequest.php
│   │   └── ViewComposers
│   │       └── SettingsComposer.php
│   ├── Mail
│   │   └── ExceptionOccured.php
│   ├── Models
│   │   ├── Setting.php
│   │   ├── Sound.php
│   │   ├── Theme.php
│   │   └── User.php
│   ├── Providers
│   │   ├── AppServiceProvider.php
│   │   ├── AuthServiceProvider.php
│   │   ├── BroadcastServiceProvider.php
│   │   ├── ComposerServiceProvider.php
│   │   ├── EventServiceProvider.php
│   │   └── RouteServiceProvider.php
│   ├── Rules
│   │   └── CurrentPasswordCheckRule.php
│   └── Services
│       ├── SoundServices.php
│       ├── ThemeServices.php
│       └── UserServices.php
├── artisan
├── bootstrap
│   ├── app.php
│   └── cache
│       ├── .gitignore
│       ├── packages.php
│       └── services.php
├── composer.json
├── composer.lock
├── config
│   ├── app.php
│   ├── auth.php
│   ├── broadcasting.php
│   ├── cache.php
│   ├── database.php
│   ├── exceptions.php
│   ├── filesystems.php
│   ├── hashing.php
│   ├── laravel-logger.php
│   ├── laravelPhpInfo.php
│   ├── lfm.php
│   ├── logging.php
│   ├── mail.php
│   ├── queue.php
│   ├── roles.php
│   ├── services.php
│   ├── session.php
│   ├── soundboard.php
│   └── view.php
├── database
│   ├── .gitignore
│   ├── factories
│   │   └── UserFactory.php
│   ├── migrations
│   │   ├── 2014_10_12_000000_create_users_table.php
│   │   ├── 2014_10_12_100000_create_password_resets_table.php
│   │   ├── 2016_01_15_105324_create_roles_table.php
│   │   ├── 2016_01_15_114412_create_role_user_table.php
│   │   ├── 2016_01_26_115212_create_permissions_table.php
│   │   ├── 2016_01_26_115523_create_permission_role_table.php
│   │   ├── 2016_02_09_132439_create_permission_user_table.php
│   │   ├── 2019_08_11_020746_create_sounds_table.php
│   │   ├── 2019_08_16_194632_create_themes_table.php
│   │   └── 2019_08_16_195006_create_settings_table.php
│   └── seeds
│       ├── ConnectRelationshipsSeeder.php
│       ├── DatabaseSeeder.php
│       ├── PermissionsTableSeeder.php
│       ├── RolesTableSeeder.php
│       ├── SettingsTableSeeder.php
│       ├── SoundsTableSeeder.php
│       ├── ThemesTableSeeder.php
│       └── UsersTableSeeder.php
├── package-lock.json
├── package.json
├── phpunit.xml
├── public
│   ├── .htaccess
│   ├── argon
│   │   ├── css
│   │   │   ├── argon.css
│   │   │   └── argon.min.css
│   │   ├── fonts
│   │   │   └── nucleo
│   │   │       ├── nucleo-icons.eot
│   │   │       ├── nucleo-icons.svg
│   │   │       ├── nucleo-icons.ttf
│   │   │       ├── nucleo-icons.woff
│   │   │       └── nucleo-icons.woff2
│   │   ├── img
│   │   │   ├── brand
│   │   │   │   ├── blue.png
│   │   │   │   ├── favicon.png
│   │   │   │   └── white.png
│   │   │   ├── icons
│   │   │   │   └── common
│   │   │   │       ├── github.svg
│   │   │   │       └── google.svg
│   │   │   └── theme
│   │   │       ├── angular.jpg
│   │   │       ├── bootstrap.jpg
│   │   │       ├── profile-cover.jpg
│   │   │       ├── react.jpg
│   │   │       ├── sketch.jpg
│   │   │       ├── team-1-800x800.jpg
│   │   │       ├── team-2-800x800.jpg
│   │   │       ├── team-3-800x800.jpg
│   │   │       ├── team-4-800x800.jpg
│   │   │       └── vue.jpg
│   │   └── js
│   │       ├── argon.js
│   │       └── argon.min.js
│   ├── css
│   │   ├── app.css
│   │   └── filemanager.css
│   ├── favicon.ico
│   ├── images
│   │   ├── avatar-default.png
│   │   ├── favicon.ico
│   │   ├── logo.jpg
│   │   └── logo.png
│   ├── index.php
│   ├── js
│   │   ├── admin.js
│   │   ├── admin.js.map
│   │   ├── app.js
│   │   └── app.js.map
│   ├── mix-manifest.json
│   └── robots.txt
├── resources
│   ├── images
│   │   ├── avatar-default.png
│   │   ├── favicon.ico
│   │   ├── logo.jpg
│   │   └── logo.png
│   ├── js
│   │   ├── admin.js
│   │   ├── app.js
│   │   ├── bootstrap.js
│   │   └── components
│   │       ├── AudioPlayer.vue
│   │       ├── ExampleComponent.vue
│   │       ├── NavBar.vue
│   │       ├── SoundLoader.vue
│   │       ├── SoundsComponent.vue
│   │       └── SoundsTable.vue
│   ├── lang
│   │   └── en
│   │       ├── admin.php
│   │       ├── auth.php
│   │       ├── messages.php
│   │       ├── pagination.php
│   │       ├── passwords.php
│   │       ├── soundboard.php
│   │       ├── themes.php
│   │       └── validation.php
│   ├── sass
│   │   ├── _base.scss
│   │   ├── _bs-visibility-classes.scss
│   │   ├── _forms.scss
│   │   ├── _heart.scss
│   │   ├── _octocat.scss
│   │   ├── _player.scss
│   │   ├── _variables.scss
│   │   ├── app.scss
│   │   └── filemanager.scss
│   └── views
│       ├── auth
│       │   ├── login.blade.php
│       │   ├── passwords
│       │   │   ├── email.blade.php
│       │   │   └── reset.blade.php
│       │   ├── register.blade.php
│       │   └── verify.blade.php
│       ├── emails
│       │   └── exception.blade.php
│       ├── forms
│       │   ├── default-theme-form.blade.php
│       │   ├── delete-sound.blade.php
│       │   └── sound-form.blade.php
│       ├── layouts
│       │   ├── app.blade.php
│       │   ├── footers
│       │   │   ├── auth.blade.php
│       │   │   ├── guest.blade.php
│       │   │   └── nav.blade.php
│       │   ├── headers
│       │   │   ├── dashboard-cards.blade.php
│       │   │   ├── guest.blade.php
│       │   │   ├── sound-cards.blade.php
│       │   │   ├── spaced.blade.php
│       │   │   └── theme-cards.blade.php
│       │   ├── navbars
│       │   │   ├── navbar.blade.php
│       │   │   ├── navs
│       │   │   │   ├── auth.blade.php
│       │   │   │   └── guest.blade.php
│       │   │   └── sidebar.blade.php
│       │   └── soundboard.blade.php
│       ├── pages
│       │   ├── dashboard.blade.php
│       │   ├── home.blade.php
│       │   ├── sounds
│       │   │   ├── create.blade.php
│       │   │   ├── edit.blade.php
│       │   │   ├── index.blade.php
│       │   │   └── show.blade.php
│       │   └── themes
│       │       └── index.blade.php
│       ├── partials
│       │   ├── analytics.blade.php
│       │   ├── delete-modal.blade.php
│       │   ├── footer.blade.php
│       │   ├── messages.blade.php
│       │   ├── octocat.blade.php
│       │   └── theme-table-list.blade.php
│       ├── profile
│       │   └── edit.blade.php
│       ├── scripts
│       │   ├── change-theme-script.blade.php
│       │   ├── delete-modal-script.blade.php
│       │   ├── delete-sound.blade.php
│       │   ├── file-manager.blade.php
│       │   ├── sweatalert-delete-user.blade.php
│       │   └── switch.blade.php
│       ├── users
│       │   ├── create.blade.php
│       │   ├── edit.blade.php
│       │   ├── index.blade.php
│       │   └── partials
│       │       └── header.blade.php
│       └── welcome.blade.php
├── routes
│   ├── api.php
│   ├── channels.php
│   ├── console.php
│   └── web.php
├── server.php
├── tests
│   ├── CreatesApplication.php
│   ├── Feature
│   │   └── ExampleTest.php
│   ├── TestCase.php
│   └── Unit
│       └── ExampleTest.php
└── webpack.mix.js
```

* Tree command can be installed using brew: `brew install tree`
* File tree generated using command `tree -a -I '.git|node_modules|vendor|storage|sound-files|.env'`

### Opening an Issue
Before opening an issue there are a couple of considerations:
* A **star** on this project shows support and is way to say thank you to all the contributors. If you open an issue without a star, *your issue may be closed without consideration.* Thank you for understanding and the support. You are all awesome!
* **Read the instructions** and make sure all steps were *followed correctly*.
* **Check** that the issue is not *specific to the development environment* setup.
* **Provide** *duplication steps*.
* **Attempt to look into the issue**, and if you *have a solution, make a pull request*.
* **Show that you have made an attempt** to *look into the issue*.
* **Check** to see if the issue you are *reporting is a duplicate* of a previous reported issue.
* **Following these instructions show me that you have tried.**
* If you have a questions send me an email to jeremykenedy@gmail.com
* Need some help, I can do my best on Slack: https://opensourcehelpgroup.slack.com
* Please be considerate that this is an open source project that I provide to the community for FREE when opening an issue.

Open source projects are the community’s responsibility to use, contribute, and debug.

### License
Laravel Soundboard is licensed under the [MIT license](https://opensource.org/licenses/MIT). Enjoy!
