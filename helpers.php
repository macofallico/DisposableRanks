<?php
  use \Nwidart\Modules\Facades\Module;

  // Check Disposable Modules
  // Return boolean
  if (!function_exists('Dispo_Modules')) {
    function Dispo_Modules($module)
    {
      $module_enabled = false;
      $dispo_module = Module::find($module);
      if($dispo_module) {
        $module_enabled = $dispo_module->isEnabled();
      }
      return $module_enabled;
    }
  }
