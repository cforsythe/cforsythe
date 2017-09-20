<?php
    function generate(){
        $leftimg = array();
        array_push($leftimg, 'blue', 'brown', 'green', 'pink');
        $rightimg = array();
        array_push($rightimg, 'darkblue', 'orange', 'red', 'tealgreen');
        for($i = 0; $i < 2;$i++){
            ${'img' . $i} = rand(0,3);
            switch($i){
                case 0: $name = $leftimg[$img0];
                        break;
                case 1: $name = $rightimg[$img1];
                        break;
            }
            display(${'img' . $i}, $i, $name);
        }
    }
    function display($img, $pos, $name){
        switch($pos){
            case 0: $position = 'left';
                    break;
            case 1: $position = 'right';
                    showRapperName();
                    break;
        }
        $name = $name . 'rapper.png';
        echo "<img id='${position}rapper' src='img/$position/$name' alt='stockimg' title='${position}rapper'/>";
    }
    function showRapperName(){
        $firstname = array('Lil', 'DJ', 'Young', 'MC', 'Big', 'Doctor', 'Daddy', 'Ya boy', 'Nasty', 'Grim', 'Gangsta', 'Ice', 'Old');
        $lastname = array('Underwear', 'Oppai', 'Austin', 'David', 'Suess', 'Sis', 'Donald', 'Man', 'X', 'Dog', 'Cat', 'Cow', 'Ape', 'Tyrannosaurus Rex', 'Utensil', 'Tooth', 'Baby Face', 'Toothpaste', 'Fish', 'Boat', 'Axe', 'Lighthouse', 'Palm Tree', 'Mouse', 'Mushroom');
        sort($firstname);
        sort($lastname);
        $fullname = $firstname[array_rand($firstname)] . " " . $lastname[array_rand($lastname)];
        $RGB = getRGB();
        echo "<div id='text' title='Click to load another name!' onclick='reload()' style='border-color:$RGB'><p id='rappername'>$fullname</p></div>";
    
        
    }
    function getRGB(){
        $colors = array();
        for($i = 0; $i < 3; $i++){
            array_push($colors, rand(0, 255));
        }
        return "rgb(${colors[0]},${colors[1]}, ${colors[2]})";
    }
?>