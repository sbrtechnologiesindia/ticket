<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
function getAdminlistChat()
{
    $CI =& get_instance();
    $CI->load->model('users/users_model');
    return $CI->users_model->getAllAdmin();
}


function getUserlistChat()
{
    $CI =& get_instance();
    $CI->load->model('users/users_model');
    return $CI->users_model->getAllUser();
}

function getChatsbtwnAdminUsers($toid,$fromid)
{
    $CI =& get_instance();
    $CI->load->model('chat/chat_model');
    return $CI->chat_model->getchatall($toid,$fromid);
}
?>
