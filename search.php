<?php
define('CSV_INDEX_CERTIFICATE_ID', 2);

    $searchUser = $_GET['keywords'];

$row = 1;
$output = [];

if (($handle = fopen("data.csv", "r")) !== FALSE) {

    while (($data = fgetcsv($handle, 100, ",")) !== FALSE) {
        $row++;


        // if the user tried to search on user and it doesn't match, skip
        if (!empty($searchUser) && $data[CSV_INDEX_CERTIFICATE_ID] == $searchUser) {

        	$output[] = $data;
            break;
        }
        else if (!empty($searchUser) && $data[CSV_INDEX_CERTIFICATE_ID] !== $searchUser) {
            continue;
        }

    }

    fclose($handle);
}
?>

<?php if (!empty($output)): ?>
    <table>
        <tr>
            <th><strong>Name</strong></th>
            <th><strong>E-mail</strong></th>
            <th><strong>Certificate_id</strong></th>

        <tr>
        <?php foreach ($output as $row): ?>
        <tr>
            <td><?=$row[0]?></td>
            <td><?=$row[1]?></td>
            <td><?=$row[2]?></td>
        </tr>
        <?php endforeach; ?>
    </table>
<?php endif; ?>