<?php
include "vendor/autoload.php";

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;

$client = new Client();
$headers = [
  'Authorization' => 'wKSrqv4ffU7O7h9gNhb83osan7ctHsvn'
];
$request = new Request('GET', 'https://ipt10-2022.mantishub.io/api/rest/issues?page_size=10&page=1', $headers);
$res = $client->sendAsync($request)->wait();
$bugs = $res->getBody()->getContents();

define('TOKEN', 'wKSrqv4ffU7O7h9gNhb83osan7ctHsvn');
define('MANTISHUB_URL', 'https://ipt10-2022.mantishub.io/');

$bugs_list = json_decode($bugs);

?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

<title>IPT10 Bugs</title>
<h1>IPT10 BUGS LIST</h1>
<main>
<p style="color:blue"><u>Miguel Carl D. Basilio</u></p>
</main>
<table class="table">
  <thead>
    <th>ID</th>
    <th>Summary</th>
    <th>Severity</th>
    <th>Status</th>
  </thead>
  <?php foreach($bugs_list -> issues as $bug) { ?>
  <tr>
    <td><?php echo $bug->id; ?></td>
    <td><?php echo $bug->summary; ?></td>
    <td><?php echo $bug->severity->name; ?></td>
    <td><?php echo $bug->status->name; ?></td>
  </tr>
  <?php } ?>
</table>

