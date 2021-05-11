<?php

function delete_form($url, $label = 'Delete') {
  $form = Form::open(['method' => 'DELETE', 'url' => $url, 'class' => 'd-inline']);
  $form .= Form::submit($label, ['class' => 'btn btn-danger']);
  $form .= Form::close();

  return $form;
}

?>
