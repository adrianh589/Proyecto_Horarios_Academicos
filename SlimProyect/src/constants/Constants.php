<?php

  namespace Horarios\Constants;
  /**
   * Class Constants
   * @package BatchRecord\Constants
   * @author Alexis Holguin <MoraHol>
   */
  class Constants
  {
    const API_PATH = __DIR__ . "/../../";
    const DAO_PATH = self::API_PATH . "src/dao/";
    const LOGS_PATH = self::API_PATH . "logs/";
    const MODELS_PATH = self::API_PATH . "src/models/";
    const CONTROLLER_PATH = self::API_PATH . "src/controllers";

    const MAX_FILES_LOGS = 15;

    public static function getDate(): string
    {
      return date('d-m-Y');
    }
  }