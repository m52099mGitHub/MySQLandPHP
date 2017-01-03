<?php

/**
 * 分页效果
 * 
 * @param int $page
 * @param int $totalPages
 * @param string $searchStr
 * @param string $goPage
 * @param string $selectPage
 * @return string
 */
function showPage($page, $totalPages, $searchStr = '', $goPage = false, $selectPage = false)
{
    $url = $_SERVER['PHP_SELF']; // 动态获取超链接地址
    $start = $page - 5;
    if ($start <= 1) {
        $start = 1;
    }
    $end = $page + 4;
    if ($end <= 10) {
        $end = 10;
    }
    if ($end > $totalPages) {
        $end = $totalPages;
    }
    for ($i = $start; $i <= $end; $i ++) {
        if ($page == $i) {
            $p .= "[{$i}]";
        } else {
            $p .= "<a href='{$url}?page={$i}{$searchStr}'>[{$i}]</a>";
        }
    }
    if ($page == 1) {
        $index = "[首页]";
        $prev = "[上一页]";
    } else {
        $index = "<a href='{$url}?page=1{$searchStr}'>[首页]</a>";
        $prev = "<a href='{$url}?page=" . ($page - 1) . "'>[上一页]</a>";
    }
    if ($page == 1) {
        $last = "[尾页]";
        $next = "[下一页]";
    } else {
        $last = "<a href='{$url}?page={$totalPages}{$searchStr}'>[尾页]</a>";
        $next = "<a href='{$url}?page=" . ($page + 1) . "{$searchStr}'>[下一页]</a>";
    }
    if ($goPage) {
        $goPage = <<<EOF
        第<input type='number' id='goPage' style='width:30px;'/>页
        <script type="text/javascript">
            var goPage=document.querySelector('#goPage');
            goPage.addEventListener('blur',function(){
                var val=parseInt(this.value,10);
                location.href="{$url}?page='+val+'{$searchStr}";
            });
            goPage.addEventListener('kerdown',function(e){
               e=e||window.event;
                    if(e.keyCode==13){
                        var val=parseInt(this.value,10);
                        location.href="{$url}?page='+val+'{$searchStr}";
               }
            })
       </script>
EOF;
    }
    if ($selectPage) {
        $selectPage = "<select id='selectPage'>";
        $selectPage .= "<option>请选择页码</option>";
        for ($i = 1; $i <= $totalPages; $i ++) {
            $selectPage.="<option value='{$i}'";
            if($page==$i){
               $selectPage.="selected='selected'>第{$i}页</option>";
            }else{
               $selectPage .= ">第{$i}页</option>";
            }
        }
        $selectPage .= "</select>";
        $selectPage .= <<<EOF
        <script>
            var selectPage=document.querySelector('#selectPage'); 
            selectPage.addEventListener('change',function(){
                var val=parseInt(this.value,10);
            location.href="{$url}?page='+val+'{$searchStr}";
            });
        </script>
EOF;
    }
    $str = "总共{$totalPages}页/当前是第{$page}页";
    $pageStr = $str . $index . $prev . $p . $next . $last . $goPage . $selectPage;
    return $pageStr;
}
?>
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	