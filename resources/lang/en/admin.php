<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Soundboard Admin Language Lines
    |--------------------------------------------------------------------------
    |
    |
    */
    'brand' => 'SoundBoard',

    'titles' => [
        'dashboard'     => 'Dashboard',
        'sounds'        => 'Sounds',
        'sound-show'    => 'Showing Sound :title',
        'sound-edit'    => 'Editing Sound :title',
        'sound-create'  => 'Creating New Sound',
        'users'         => 'User Admin',
        'create-user'   => 'Create User',
        'edit-user'     => 'Edit User',
        'edit-profile'  => 'Edit Profile',
    ],

    'dashboard' => [
        'total-sounds'      => 'Total Sounds',
        'enabled-sounds'    => 'Enabled Sounds',
        'total-users'       => 'Total Users',
        'themes-available'  => 'Themes Available',
    ],

    'themes' => [
        'current-theme'     => 'Current Theme',
        'total-themes'      => 'Total Themes',
        'enabled-themes'    => 'Enabled Themes',
        'disabled-themes'   => 'Disabled Themes',
    ],

    'sounds' => [
        'index' => [
            'title'     => 'Sounds',
            'add-new'   => 'Add New',
            'table' => [
                'order'     => 'Order',
                'enabled'   => 'Enabled',
                'title'     => 'Title',
                'file'      => 'File',
                'yes'       => 'Yes',
                'no'        => 'No',
                'view'      => 'View',
                'edit'      => 'Edit',
                'delete'    => 'Delete',
            ]
        ],
        'create' => [
            'back'   => 'Back to Sounds',
            'title'  => 'Creating New Sound',
        ],
        'edit' => [
            'title'     => 'Editing Sounds: <strong>:title</strong>',
            'back'      => 'Back to Sounds',
        ]
    ],

    'dropdown' => [
        'welcome'   => 'Welcome!',
        'myprofile' => 'My profile',
        'logout'    => 'Logout',
    ],

    'sidebar' => [
        'dashboard'     => 'Dashboard',
        'sounds'        => 'Sounds',
        'themes'        => 'Themes',
        'user-admin'    => 'User Admin',
        'roles-admin'   => 'Roles Admin',
        'activity'      => 'Activity',
        'php-info'      => 'PHP Info',
    ],

    'modals' => [
        'delete' => [
            'title'     => 'Are you sure you want to delete sound: ',
            'text'      => 'You won\'t be able to revert this!',
            'button'    => 'Yes, delete sound',
        ],
        'deleted' => [
            'title' => 'Deleted!',
        ]
    ],

    'messages' => [
        'sound-deleted'         => 'Sound deleted: <strong>:title</strong>',
        'sort-order-updated'    => 'Sort order updated successfully!',
        'status-updated'        => 'Successfully :status: :title',
    ]
];
