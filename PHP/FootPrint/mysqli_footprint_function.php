<?php 
/**
 * 
 * 连接数据库建议使用方法2,3
 * 连接MySQL操作
 * 方法1封装:
 * @param string $host
 * @param string $user
 * @param string $password
 * @param string $charset
 * @param string $database
 * @return object $database
 */
function connect1($host,$user,$password,$charset,$database)
{
    $link = mysqli_connect($host, $user, $password) or die('数据库连接失败!<br/>ERROR' . ':' . mysqli_connect_errno() . ':' . mysqli_connect_error());
    mysqli_set_charset($link, $charset);
    mysqli_select_db($link, $database) or die('指定数据库打失败!<br/>ERROR' . ':' . mysqli_errno($link) . ':' . mysqli_error($link));
    return $link;
}

/**
 * 连接MySQL操作
 * 方法2封装:
 * @param array $config 数据库相关配置
 * @return object
 * 
 */
function connect2($config){
    $link=mysqli_connect($config['host'],$config['user'],$config['pwd'])or die('数据库连接失败!<br/>ERROR' . ':' . mysqli_connect_errno() . ':' . mysqli_connect_error());
    mysqli_set_charset($link, $config['charset']);
    mysqli_select_db($link, $config['dbName']) or die('指定数据库打失败!<br/>ERROR' . ':' . mysqli_errno($link) . ':' . mysqli_error($link));
    return $link;
}


/**
 * 连接MySQL操作
 * 方法3封装:
 * @return object
 */
function connect3(){
    $link=mysqli_connect(DB_HOST,DB_USER,DB_PWD) or die('数据库连接失败!<br/>ERROR' . ':' . mysqli_connect_errno() . ':' . mysqli_connect_error());
    mysqli_set_charset($link, DB_CHARSET);
    mysqli_select_db($link, DB_DBNAME) or die('指定数据库打失败!<br/>ERROR' . ':' . mysqli_errno($link) . ':' . mysqli_error($link));
    return $link;
}

/**
 * 
 * 插入操作封装
 * 
 * @param object $link
 * @param array $data
 * @param string $table
 * @return boolean
 */
function insert($link,$data,$table){
    $keys=join(',',array_keys($data));
    $vals="'".join("','",array_values($data))."'";
    $query="INSERT {$table}({$keys}) VALUES({$vals})";
    echo $query;//SQL语句调试
    $res=mysqli_query($link, $query);
    if($res){
        return mysqli_insert_id($link);
    }else{
        return false;
    }
}



/* 
 * $data=array(
    'username'=>'KMJ',
    'password'=>'123456',
    'email'=>'HYK@163.com',
    'age'=>'18',
    'regTime'=>'2016'
); 

$query="UPDATE user SET password='HYK1',email='HYK1@163.com' WHERE id=2;";
*/



/**
 * 
 * 更新记录操作封装
 * 
 * @param string $link
 * @param array $data
 * @param string $table
 * @param string $where
 * @return boolean
 */
function update($link,$data,$table,$where=null){
    foreach ($data as $key=>$value){
        $set.="{$key}='{$value}',";
    }
    $set=trim($set,',');//去掉最右边的字符串
    $where=$where?" WHERE {$where} ":'';
    $query="UPDATE {$table} SET {$set} {$where}";
//     echo $query;exit;
    $res=mysqli_query($link, $query);
    if($res){
        return mysqli_affected_rows($link);
    }else{
        return false;
    }  
}


/**
 * @param string $link
 * @param string $table
 * @param string $where
 * @return boolean
 */
function delete($link,$table,$where=null){
    $where=$where?" WHERE {$where}":'';
    $query="DELETE FROM {$table} {$where}";
    $res=mysqli_query($link, $query);
    if($res){
        return mysqli_affected_rows($link);
    }else{
        return false;
    }
}


/**
 * 查找一条语句操作封装
 * 
 * @param object $link
 * @param string $query
 * @param string $result_type MYSQLI_ASSOC/MYSQLI_BOTH/MYSQLI_NUM
 * @return boolean
 */
function fetchOne($link,$query,$result_type=MYSQLI_ASSOC){
    $result=mysqli_query($link, $query);
    if($result && mysqli_affected_rows($link)>0){
        return mysqli_fetch_array($result,$result_type);
    }else{
        return false;
    }
}


/**
 * 得到所有记录操作封装
 * 
 * @param object $link
 * @param string $query
 * @param string $result_type
 * @return unknown|boolean
 */
function fetchAll($link,$query,$result_type=MYSQLI_ASSOC){
    $result=mysqli_query($link, $query);
    if($result && mysqli_num_rows($result)>0){
        while ($row=mysqli_fetch_array($result,$result_type)){
            $rows[]=$row;
        }
        return $rows;
    }else{
            return false;
        }
}



/**
 * 
 * 得到结果集中的记录条数操作封装
 * 
 * @param object $link
 * @param string $query
 * @return boolean
 * 
 */
function getResultNum($link, $query){
    $result=mysqli_query($link, $query);
    if($result){
        return mysqli_num_rows($result);
    }else{
        return false;
    }
}


/**
 * //得到表中的所有数据操作封装
 * 
 * @param object $link
 * @param string $table
 * @return unknown|boolean
 */
function getTotalRows($link,$table){
    $query="SELECT COUNT(*) AS totalRows FROM {$table}";
    $result=mysqli_query($link, $query);
    if($result && mysqli_affected_rows($link)>0){
        $row=mysqli_fetch_assoc($result);
        return $row['totalRows'];
    }else{
        return false;
    }
}

//系统信息封装
function getHostInfo($link){
    return mysqli_get_host_info($link);
}

function getServerInfo($link){
    return mysqli_get_server_info($link);
}

function getClientInfo($link){
    return mysqli_get_client_info($link);
}

function getProtoInfo($link){
    return mysqli_get_proto_info($link);
}





?>
