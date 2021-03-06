<?php
require_once('../lib/Phirehose.php');
require_once('../lib/OauthPhirehose.php');

/**
 * Example of using Phirehose to display the 'sample' twitter stream.
 */
class SampleConsumer extends OauthPhirehose
{
  /**
   * Enqueue each status
   *
   * @param string $status
   */
  public function enqueueStatus($status)
  {
    /*
     * In this simple example, we will just display to STDOUT rather than enqueue.
     * NOTE: You should NOT be processing tweets at this point in a real application, instead they should be being
     *       enqueued and processed asyncronously from the collection process.
     */
    $data = json_decode($status, true);
    if (is_array($data) && isset($data['user']['screen_name'])) {
      print $data['user']['screen_name'] . ': ' . urldecode($data['text']) . "\n";
    }
  }
}

// The OAuth credentials you received when registering your app at Twitter
define("TWITTER_CONSUMER_KEY", "23CzECqKmyTwwIQGLtGrXkBtL");
define("TWITTER_CONSUMER_SECRET", "iAUBN3OIwErlvKunpegojiP0sWNN8Iolfk3CVPUEXbKQMzCPq5");


// The OAuth data for the twitter account
define("OAUTH_TOKEN", "352037987-gmk04jPQTrlrdXl74E5e1n3GnPko6CAsuDA0lL1E");
define("OAUTH_SECRET", "csHsci4QS9J28hbeBSCkyhwkbMExqbMvEGGfWP0qSaem4");

// Start streaming
$sc = new SampleConsumer(OAUTH_TOKEN, OAUTH_SECRET, Phirehose::METHOD_SAMPLE);
$sc->consume();
