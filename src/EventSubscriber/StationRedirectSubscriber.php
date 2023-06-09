<?php

namespace Drupal\tide_station_locator\EventSubscriber;

/**
 * @file
 * Contains \Drupal\tide_station_locator\EventSubscriber\StationRedirectSubscriber.
 */

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpKernel\Event\GetResponseEvent;
use Symfony\Component\HttpKernel\KernelEvents;

/**
 * Redirects location pages to station URLs.
 */
class StationRedirectSubscriber implements EventSubscriberInterface {

  /**
   * {@inheritdoc}
   */
  public static function getSubscribedEvents() {
    // This announces which events you want to subscribe to.
    // We only need the request event for this example.  Pass
    // this an array of method names.
    return([
      KernelEvents::REQUEST => [
        ['redirectStations'],
      ],
    ]);
  }

  /**
   * Redirect requests for stations.
   *
   * @param \Symfony\Component\HttpKernel\Event\GetResponseEvent $event
   *   Event object.
   */
  public function redirectStations(GetResponseEvent $event) {
    $request = $event->getRequest();

    if (file_exists(dirname(DRUPAL_ROOT) . '/docroot/modules/contrib/tide_station_locator/assets/redirects.php')) {
      include dirname(DRUPAL_ROOT) . '/docroot/modules/contrib/tide_station_locator/assets/redirects.php';
      $uri = explode('?', $request->getRequestUri());
      // This is necessary because this also gets called on
      // node sub-tabs such as "edit", "revisions", etc.  This
      // prevents those pages from redirected.
      if ($uri && $uri[0] == '/site-4/location') {
        $content_vicpol = _tide_station_locator_redirects();
        if (in_array($uri[1], array_keys($content_vicpol))) {
          $response = new RedirectResponse($content_vicpol[$uri[1]]);
          $event->setResponse($response);
          $response->send();
        }
      }
    }
  }

}
