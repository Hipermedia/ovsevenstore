<?php

/* EXTRA FUNCTIONS */

function comisiones() {
	$userID	= get_current_user_id();
	$userMeta	= get_user_meta( $userID );
	$userInfo	= get_userdata( $userID );
	$userData	= array();	

	$userData['id']				= $userInfo->ID;
	$userData['nombre']			= $userInfo->first_name;
	$userData['apellido']		= $userInfo->user_lastname;
	$userData['email']			= $userInfo->user_email;
	$userData['usuario']		= $userInfo->user_login;

	$userData['registrado']		= $userMeta['registradoApi'][0];
	$userData['upline']			= $userMeta['uplineApi'][0];

	//Planes
	$userData['basico']			= $userMeta['basicoApi'][0];
	$userData['premier']		= $userMeta['premierApi'][0];
	$userData['plus']			= $userMeta['plusApi'][0];
	$userData['ultra']			= $userMeta['ultraApi'][0];
	$userData['supremo']		= $userMeta['supremoApi'][0];
	$userData['master']			= $userMeta['masterApi'][0];
	//Comisiones
	$userData['cbasico']		= $userMeta[' gananciaBasicoApi'][0];
	$userData['cpremier']		= $userMeta[' gananciaPremierApi'][0];
	$userData['cplus']			= $userMeta['gananciaPlusApi'][0];
	$userData['cultra']			= $userMeta['gananciaUltraApi'][0];
	$userData['csupremo']		= $userMeta['gananciaSupremoApi'][0];
	$userData['cmaster']		= $userMeta['gananciaMasterApi'][0];

	return $userData;
}

function redApi( $rID = FALSE, $generacion = 0, $tipo_hijos = FALSE, $cached_query = array() ) {

	$result = array();
	if ($generacion===0) {
		$count_basico 	= 0;
		$count_premier	= 0;
		$count_plus		= 0;
		$count_ultra	= 0;
		$count_supremo	= 0;
		$count_master	= 0;
		$count_registrados	= 0;
	}
	
	$count_i		= 0;

	if ($rID) {
		$cUserID	= $rID;
	} else {
		$cUserID	= get_current_user_id();
	}

	$cUserMeta	= get_user_meta( $cUserID );
	$cUserInfo	= get_userdata( $cUserID );

	if ($generacion===0) {
		$result['ID'] = $cUserID;
		$result['numero'] = $cUserInfo->data->user_login;
		$result['nombre'] = $cUserMeta['first_name'][0] . ' ' . $cUserMeta['last_name'][0];
		
		$result['basico'] 	= $cUserMeta['basicoApi'][0];
		$result['premier'] 	= $cUserMeta['premierApi'][0];
		$result['plus'] 	= $cUserMeta['plusApi'][0];
		$result['ultra'] 	= $cUserMeta['ultraApi'][0];
		$result['supremo'] 	= $cUserMeta['supremoApi'][0];
		$result['master'] 	= $cUserMeta['masterApi'][0];

		$result['hijos_registrados'] = array();
		$result['hijos_basico'] = array();
		$result['hijos_premier'] = array();
		$result['hijos_plus'] = array();
		$result['hijos_ultra'] = array();
		$result['hijos_supremo'] = array();
		$result['hijos_master'] = array();

	}

	if ($generacion===0) {
		$query	= get_users();
		$cached_query = $query;
	} else {
		$query	= $cached_query;
	}

	foreach ($query as $key => $value) {

		$user_meta = get_user_meta($value->ID);
		
		if ( ($user_meta['uplineApi'][0] == $cUserInfo->data->user_login) AND ($generacion === 0) ) {

			//	Query users with no plan
			if ( !$user_meta['basicoApi'][0] && !$user_meta['premierApi'][0] && !$user_meta['plusApi'][0] && !$user_meta['ultraApi'][0] && !$user_meta['supremoApi'][0] && !$user_meta['masterApi'][0] ) {

				$result['hijos_registrados'][$count_registrados]['ID']			= $value->ID;
				$result['hijos_registrados'][$count_registrados]['numero']		= $value->user_login;
				$result['hijos_registrados'][$count_registrados]['nombre']		= $user_meta['first_name'][0] . ' ' . $user_meta['last_name'][0];
				$result['hijos_registrados'][$count_registrados]['hijos_registrados']	= redApi($value->ID, $generacion+1, 'registrados', $cached_query);
				$count_registrados++;

			}

			//Query children by plan
			if ($user_meta['basicoApi'][0]) {

				$result['hijos_basico'][$count_basico]['ID']			= $value->ID;
				$result['hijos_basico'][$count_basico]['numero']		= $value->user_login;
				$result['hijos_basico'][$count_basico]['nombre']		= $user_meta['first_name'][0] . ' ' . $user_meta['last_name'][0];
				$result['hijos_basico'][$count_basico]['basico']		= $user_meta['basicoApi'][0];
				$result['hijos_basico'][$count_basico]['hijos_basico']	= redApi($value->ID, $generacion+1, 'basico', $cached_query);
				$count_basico++;

			}

			if ($user_meta['premierApi'][0]) {

				$result['hijos_premier'][$count_premier]['ID']				= $value->ID;
				$result['hijos_premier'][$count_premier]['numero']			= $value->user_login;
				$result['hijos_premier'][$count_premier]['nombre']			= $user_meta['first_name'][0] . ' ' . $user_meta['last_name'][0];
				$result['hijos_premier'][$count_premier]['premier']			= $user_meta['premierApi'][0];
				$result['hijos_premier'][$count_premier]['hijos_premier']	= redApi($value->ID, $generacion+1, 'premier', $cached_query);
				$count_premier++;

			}

			if ($user_meta['plusApi'][0]) {

				$result['hijos_plus'][$count_plus]['ID']			= $value->ID;
				$result['hijos_plus'][$count_plus]['numero']		= $value->user_login;
				$result['hijos_plus'][$count_plus]['nombre']		= $user_meta['first_name'][0] . ' ' . $user_meta['last_name'][0];
				$result['hijos_plus'][$count_plus]['plus']			= $user_meta['plusApi'][0];
				$result['hijos_plus'][$count_plus]['hijos_plus']	= redApi($value->ID, $generacion+1, 'plus', $cached_query);
				$count_plus++;

			}

			if ($user_meta['ultraApi'][0]) {

				$result['hijos_ultra'][$count_ultra]['ID']			= $value->ID;
				$result['hijos_ultra'][$count_ultra]['numero']		= $value->user_login;
				$result['hijos_ultra'][$count_ultra]['nombre']		= $user_meta['first_name'][0] . ' ' . $user_meta['last_name'][0];
				$result['hijos_ultra'][$count_ultra]['ultra']		= $user_meta['ultraApi'][0];
				$result['hijos_ultra'][$count_ultra]['hijos_ultra'] = redApi($value->ID, $generacion+1, 'ultra', $cached_query);
				$count_ultra++;

			}


			if ($user_meta['supremoApi'][0]) {

				$result['hijos_supremo'][$count_supremo]['ID']				= $value->ID;
				$result['hijos_supremo'][$count_supremo]['numero']			= $value->user_login;
				$result['hijos_supremo'][$count_supremo]['nombre']			= $user_meta['first_name'][0] . ' ' . $user_meta['last_name'][0];
				$result['hijos_supremo'][$count_supremo]['supremo']			= $user_meta['supremoApi'][0];
				$result['hijos_supremo'][$count_supremo]['hijos_supremo']	= redApi($value->ID, $generacion+1, 'supremo', $cached_query);
				$count_supremo++;

			}

			if ($user_meta['masterApi'][0]) {

				$result['hijos_master'][$count_master]['ID']			= $value->ID;
				$result['hijos_master'][$count_master]['numero']		= $value->user_login;
				$result['hijos_master'][$count_master]['nombre']		= $user_meta['first_name'][0] . ' ' . $user_meta['last_name'][0];
				$result['hijos_master'][$count_master]['master']		= $user_meta['masterApi'][0];
				$result['hijos_master'][$count_master]['hijos_master']	= redApi($value->ID, $generacion+1, 'master', $cached_query);
				$count_master++;

			}


		
		}

		if ( ($user_meta['uplineApi'][0] == $cUserInfo->data->user_login) AND ($generacion > 0) ) {

				$result[$count_i]['ID']			= $value->ID;

				$result[$count_i]['numero']		= $value->user_login;

				$result[$count_i]['nombre']		= $user_meta['first_name'][0] . ' ' . $user_meta['last_name'][0];
				
				if ( isset($cUserMeta[$tipo_hijos.'Api'][0]) ) {
				
					$result[$count_i][$tipo_hijos]	= $cUserMeta[$tipo_hijos.'Api'][0];
				
				}
				
				if ($generacion <= 5) {
				
					$result[$count_i]['hijos_'.$tipo_hijos]	= redApi($value->ID, $generacion+1, $tipo_hijos, $cached_query);
				
				}
				
				$result[$count_i][$tipo_hijos]		= $result[$count_i]['hijos_'.$tipo_hijos] ? TRUE : FALSE;

				$count_i++;
		
		}

	}

	if ($generacion == 0)
	//print_array($result);
	return $result;
}