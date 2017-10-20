<?php
    include_once('db_fns.php');
    include_once('header.php');
    
    $handle = db_connect();
    $keywords_string = "";
    if ($_REQUEST['keyword']){
        $keywords = explode(' ', $_REQUEST['keyword']);
        $num_keywords = count($keywords);
        for ($i = 0; $i<$num_keywords; $i++){
            if($i){
                $keywords_string .= "or k.keyword = '".$keywords[$i]."'";
            }else{
                $keywords_string .= "k.keyword = '".$keywords[$i]."'";
            }
        }
        
        $query = "select s.id,
                         s.headline, 10*sum(k.weight)/$num_keywords as score
                         from stories s, keywords k
                         where s.id = k.story
                                and ($keywords_string)
                                and published is not null
                         group by s.id, s.headline
                         order by score desc, s.id desc";
        $result = mysqli_query($handle,$query);
    }
    echo '<h2>Search results</h2>';
    
    if($result && mysqli_num_rows($result)){
        echo '<table>';
        while ($matches = mysqli_fetch_assoc($result)){
            echo "
                <tr>
                    <td>
                        <a href='page.php?story={$matches['id']}'>
                        {$matches['headline']}
                    </td>
                    
                    <td>
                ";
            echo floor($matches['score']).'%';
            echo '</td></tr>';
        }
        echo '</table>';
    }else{
        echo 'No matching stories found';
    }
    include_once('footer.php');
?>