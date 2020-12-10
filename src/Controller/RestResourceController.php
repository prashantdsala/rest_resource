<?php

namespace Drupal\rest_resource\Controller;

use Drupal\node\NodeInterface;

use Drupal\Core\ControllerInterface;
use Drupal\Core\Controller\ControllerBase;
use Drupal\Core\Config\ConfigFactory;

use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;

class RestResourceController extends  ControllerBase {

  /**
   * Stores the configuration factory.
   *
   * @var \Drupal\Core\Config\ConfigFactory
   */
  protected $configFactory;
  
  /**
   * Constructs a object.
   */
  public function __construct(ConfigFactory $configFactory) {
    $this->configFactory = $configFactory;
  }
  
  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container) {
    return new static($container->get('config.factory'));
  }

  /** 
   * @param $site_api_key - String
   * @param $node - Node object
   * @return $response - JSON
  */
  public function get($site_api_key, NodeInterface $node) {
  
    $configuration_api_key = $this->configFactory->getEditable('system.site')->get('siteapikey');
    
    // Return JSON response for page content type and site api key matches.
    if ($node->getType() == 'page' && $configuration_api_key != 'No API Key yet' && $configuration_api_key == $site_api_key) {
      $response = $node->toArray();
      $status = 200;
    }
    else {
      $response = ['error' => 'Access Denied'];
      $status = 401;
    }
 
    return new JsonResponse(
      $response, $status, 
      ['Content-Type'=> 'application/json']
    );
  }
}