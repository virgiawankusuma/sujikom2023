<?php

function is_logged_in() {
  if (!session()->has('email')) {
    session()->setFlashdata('message', 'Please login first');
    return false;
  }
}