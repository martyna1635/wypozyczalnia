<?php
require '../mysql/Order.php';
require '../mysql/User.php';
require '../mysql/Movie.php';

$user = new User();
$movie = new Movie();
$order = new Order();
if ($_GET['all'] == 0)
	$orders = $order->getAll(); else
	$orders = $order->getUserAll(1);
$i = 0;
?>


		<table class="table table-hover">
				<thead>
					<tr>
						<th>#</th>
						<th>Użytkownik</th>
						<th>Film</th>
						<th>Data</th>
					</tr>
				</thead>
				<?php
				foreach ($orders as $order) {
					++$i;
					$username = $user->getById($order['userd_id']);
					$title = $movie->getById($order['movie_id']);

					?>
					
						<tbody>
							<tr>
								<td><?=$i?></td>
								<td><?=$username?></td>
								<td><?=$title?></td>
								<td><?=$order['date']?></td>
							</tr>
						<?php
						} ?>
						</tbody>
			</table>

