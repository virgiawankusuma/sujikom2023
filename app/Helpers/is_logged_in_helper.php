<?php

function is_logged_in() {
  if (!session()->has('email')) {
    session()->setFlashdata('warnMessage', 'Please login first');
    return false;
  }
}