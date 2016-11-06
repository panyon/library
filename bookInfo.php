<?php

$flag = $_POST['flag'];

include "connect.php";

if($flag == 1){
	//添加
	$bookName = $_POST['bookName'];
	$bookAuthor = $_POST['bookAuthor'];
	$recommend = $_POST['recommend'];
	$bookDesc = $_POST['bookDesc'];
	$category = $_POST['category'];

	mysqli_query($link, "insert into bookinfo(book_name, book_author, recommend,book_category,book_desc) values('".$bookName."', '".$bookAuthor."', ".$recommend.",'".$category."','".$bookDesc."')");

} else if($flag == 2){
	//删除
	$id= $_POST['id'];
	mysqli_query($link, "delete from bookinfo where id =".$id);

} else if($flag == 3){
	//更新查询
	$id= $_POST['id'];
	$result=mysqli_query($link, "select * from bookinfo where id =".$id);
	while ($row=mysqli_fetch_assoc($result)) {
		$book = array(
			'id'=>$row['id'],
			'bookName'=>$row['book_name'],
			'bookAuthor'=>$row['book_author'],
			'recommend'=>$row['recommend'],
			'category'=>$row['book_category'],
			'bookDesc'=>$row['book_desc']
        );
    }
    echo json_encode($book);
	exit;

} else if($flag == 4){
	//更新数据
	$id= $_POST['id'];
	$bookName = $_POST['bookName'];
	$bookAuthor = $_POST['bookAuthor'];
	$recommend = $_POST['recommend'];
	$bookDesc = $_POST['bookDesc'];
	$category = $_POST['category'];
	mysqli_query($link, "update bookinfo set book_name = '".$bookName."',book_author = '".$bookAuthor."',recommend = ".$recommend.",book_category = '".$category."',book_desc = '".$bookDesc."' where id = ".$id);
}

//列表数据查询
$result=mysqli_query($link, "select * from bookinfo order by id desc");
while ($row=mysqli_fetch_assoc($result)) {
	$rec = $row['recommend'];
	if($rec == 1){
		$rec= '是';
	}else if($rec == 2){
		$rec = '否';
	}

	// 如果单选按钮 则下面这样判断就可以了
	$str = '';
	if($row['book_category'] == 1){
        $str = $str.'计算机 ';
    }else if($row['book_category'] == 2){
        $str = $str.'文学 ';
    }else if($row['book_category'] == 3){
        $str = $str.'会计';
    }




	$sayList[] = array(
		'id'=>$row['id'],
		'bookName'=>$row['book_name'],
		'bookAuthor'=>$row['book_author'],
		'recommend'=>$rec,
		'category'=>$str,
		'bookDesc'=>$row['book_desc']
    );
}
echo json_encode($sayList);

?>