<?php
require '../mysql/Order.php';
require '../mysql/User.php';
require '../mysql/Movie.php';

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
					$username = 'test';
					$movie = "test2";
					?>
					
						<tbody>
							<tr>
								<td><?=$i?></td>
								<td><?=$username?></td>
								<td><?=$movie?></td>
								<td><?=$order['date']?></td>
							</tr>
						<?php
						} ?>
						</tbody>
			</table>

