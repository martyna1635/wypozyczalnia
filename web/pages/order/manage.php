<?php
require '../mysql/Order.php';
require '../mysql/User.php';
require '../mysql/Movie.php';

$user = new User();
$movie = new Movie();
$order = new Order();

$orders = $order->getAll(); 
$i = 0;
?>


		<table class="table table-hover">
				<thead>
					<tr>
						<th>#</th>
						<th>Użytkownik</th>
						<th>Film</th>
						<th>Data</th>
						<th>Usuń</th>
					</tr>
				</thead>
				<?php
				foreach ($orders as $order) {
					++$i;
					$username = $user->getById($order['userd_id'])[0]['username'];
					$title = $movie->getById($order['movie_id'])[0]['title'];

					?>
					
						<tbody>
							<tr>
								<td><?=$i?></td>
								<td><?=$username?></td>
								<td><?=$title?></td>
								<td><?=$order['date']?></td>
								<td><a onclick="deleteOrder(<?=$order['id']?>);" href="#"> X </a></td>
							</tr>
						<?php
						} ?>
						</tbody>
			</table>

