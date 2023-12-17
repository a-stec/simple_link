<?php
function validate_url($url) {
  return (filter_var($url, FILTER_VALIDATE_URL) ? true : false);
}
