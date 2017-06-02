<!doctype html>
<html>
<head>
    <title>Export to Word</title>
    <style>
        .word-table {
            border:1px solid black !important; 
            border-collapse: collapse !important;
            width: 100%;
        }
        .word-table tr th, .word-table tr td{
            border:1px solid black !important; 
            padding: 5px 10px;
        }
    </style>
</head>
<body>
    <h2>Term List</h2>
    <table class="word-table" style="margin-bottom: 10px">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Description</th>
            <th>Status</th>
            
        </tr><?php
        foreach ($term_data as $term)
        {
            ?>
            <tr>
                <td><?php echo ++$start ?></td>
                <td><?php echo $term->name ?></td>
                <td><?php echo $term->description ?></td>
                <td><?php echo $this->User_model->status($term->status); ?></td>	
            </tr>
            <?php
        }
        ?>
    </table>
</body>
</html>