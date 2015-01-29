<?php
session_start();
require '../mysql/Order.php';
require '../mysql/User.php';
require '../mysql/Movie.php';

$user = new User();
$movie = new Movie();
$order = new Order();
if ($_GET['all'] == 1)
	$orders = $order->getAll(); else
	$orders = $order->getUserAll($_SESSION['userId']);
$i = 0;
?>


		<table class="table table-hover">
				<thead>
					<tr>
						<th>#</th>
						<th>Użytkownik</th>
						<th>Film</th>
						<th>Cena transakcji</th>
						<th>Kiedy zakupił</th>
					</tr>
				</thead>
				<?php
				foreach ($orders as $order) {
					++$i;
					$username = $user->getById($order['userd_id'])[0]['username'];
					$title = $movie->getById($order['movie_id'])[0]['title'];
					$price = $movie->getById($order['movie_id'])[0]['price'];
					?>
					
						<tbody>
							<tr>
								<td><?=$i?></td>
								<td><?=$username?></td>
								<td><?=$title?></td>
								<td><?=$price?></td>
								<td><?=$order['date']?></td>
							</tr>
						<?php
						} ?>
						</tbody>
			</table>

