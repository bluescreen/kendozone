<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Defines all messages sent from flash
    |--------------------------------------------------------------------------
    |
    |
    */

    'user_already_registered_in_category' => 'El usuario ya esta registrado en esta categoría.',

    // Torneo
    'tournament_create_successful' => 'Torneo <b>:name</b><br/> creado exitosamente',
    'tournament_update_successful' => 'Torneo <b>:name</b><br/> actualizado exitosamente',
    'tournament_delete_successful' => 'Torneo <b>:name</b><br/> borrado exitosamente',
    'tournament_restored_successful' => 'El torneo <b>:name</b><br/> restaurado exitosamente',

    'tournament_create_error' => '¡Oooops! Hubo un problema al crear el torneo',
    'tournament_update_error' => '¡Oooops! Hubo un problema al editar el torneo',
    'tournament_delete_error' => 'Hubo un problema al borrar el torneo :name',
    'tournament_restored_error' => 'Hubo un problema al restaurar :name',


    // Usuario
    'user_create_successful' => 'Usuario <br/> creado exitosamente',
    'user_update_successful' => 'Usuario <br/> actualizado exitosamente',
    'user_delete_successful' => 'Usuario <br/> borrado exitosamente',
    'user_restore_successful' => 'Usuario <br/> restaurado exitosamente',
    'user_registered_successful' => 'El usuario <br/> se agreg&oacute; al torneo :tournament',

    'user_create_error' => 'Hubo un problema al crear el usuario',
    'user_update_error' => 'Hubo un problema al editar el usuario',
    'user_delete_error' => 'Hubo un problema al borrar el usuario',
    'user_restore_error' => 'Hubo un problema al restaurar el usuario',
    'user_registered_error' => 'Hubo un problema al restaurar el usuario',

    'user_status_successful' => 'Estatus actualizado',
    'user_status_error' => 'Hubo un error al actualizar :name',


    // Championship
    'category_create_successful' => 'La categor&iacute;a se configur&oacute; de forma exitosa',
    'category_update_successful' => 'La categor&iacute;a se actualiz&oacute; de forma exitosa',
    'category_delete_successful' => 'La categor&iacute;a se borr&oacute; de forma exitosa',

    'category_create_error' => 'Hubo un problema al crear la categor&iacute;a',
    'category_update_error' => 'Hubo un problema al actualizar la categor&iacute;a',
    'category_delete_error' => '¡Oooops! Hubo un problema al borrar la categor&iacute;a',
    'you_must_choose_at_least_one_championship' => 'Debes de seleccionar al menos una categoría',


    //Invitation

    'invitation_needed' => 'Necesitas una invitaci&oacute;n para registarte en este torneo.',
    'invitation_expired' => 'Ya pasó la fecha limite de registro al torneo, o tu invitaci&oacute;n ha expirado.',
    'invitation_used' => 'La invitaci&oacute;n ya ha sido usada',
    'invitation_sent' => 'Las invitaciones han sido enviadas',
    'email_not_valid' => 'El email :email no esta válido. Operación Cancelada',
    'tx_for_register_tournament' => 'Gracias por registrarte al torneo :tournament',

    // Permisos
    'access_denied' => 'No tiene acceso a esta secci&oacute;n',


    // Federation
    'federation_edit_successful' => 'Federación <br/><b>:name</b><br/> actualizada exitosamente',

    'you_dont_own_federation' => 'No tienes federación asociada a tu cuenta',
    'please_ask_superadmin' => 'Actualiza los registros oficiales de la FIK, y solicita al administrador (admin@kendozone.com)',





    //Association
    'association_create_successful' => 'Associación <br/><b>:name</b><br/> creada exitosamente',
    'association_edit_successful' => 'Associación <br/><b>:name</b><br/> actualizada exitosamente',
    'association_delete_successful' => 'Associación <br/><b>:name</b><br/> borrada exitosamente',
    'association_delete_error' => 'Hubo un problema al borrar la asociación',
    'association_restored_successful' => 'Associación <br/><b>:name</b><br/> restaurada exitosamente',
    'association_restored_error' => 'Hubo un problema al restaurar la asociación',

    'you_dont_own_association' => 'No tienes asociación ligada a tu cuenta',
    'please_ask_federationPresident' => 'Solicitalo a tu presidente de federación',

    //Club
    'club_create_successful' => 'Club <br/><b>:name</b><br/> creado exitosamente',
    'club_edit_successful' => 'Club <br/><b>:name</b><br/> actualizado exitosamente',
    'club_delete_successful' => 'Club <br/><b>:name</b><br/> borrado exitosamente',
    'club_delete_error' => 'Hubo un problema al borrar el club',
    'club_restored_successful' => 'Club <br/><b>:name</b><br/> restaurado exitosamente',
    'club_restored_error' => 'Hubo un problema al restaurar el club',

    'you_dont_own_club' => 'No tienes club asociado a tu cuenta',
    'please_ask_associationPresident' => 'Solicitalo a tu presidente de asociación',


    // Team

    'team_create_successful' => 'Equipo <br/><b>:name</b><br/> creado exitosamente',
    'team_edit_successful' => 'Equipo <br/><b>:name</b><br/> actualizado exitosamente',
    'team_delete_successful' => 'Equipo <br/><b>:name</b><br/> borrado exitosamente',
    'team_delete_error' => 'Hubo un problema al borrar el equipo',
    'team_restored_successful' => 'Equipo <br/><b>:name</b><br/> restaurado exitosamente',
    'team_restored_error' => 'Hubo un problema al restaurar el equipo',
];
