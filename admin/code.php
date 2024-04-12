<?php
include('authentication.php');




if(isset($_POST['add_user']))
{
    $fname = $_POST['fn'];
    $lname = $_POST['ln'];
    $email = $_POST['em'];
    $password = $_POST['pas'];
    $role_as = $_POST['rol'];

    $query = "INSERT INTO users (fname,lname,email,password,role_as) VALUES ('$fname','$lname','$email','$password','$role_as')";
    $data = mysqli_query($con, $query);

    if($data)
    {
        $_SESSION['message'] = "Admin/User Added Successfully";
        header('Location: view-users.php');
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Something Went Wrong.!";
        header('Location: view-users.php');
        exit(0);
    }
}

if(isset($_POST['upbtn'])) {

    $fname = $_POST['fn'];
    $lname = $_POST['ln'];
    $email = $_POST['em'];
    $password = $_POST['pas'];
    $user_id = $_POST['uid'];
    $role_as = $_POST['rol'];


    $query = "UPDATE users SET fname='$fname', lname='$lname', email='$email',	password='$password', role_as='$role_as' WHERE id='$user_id' ";
    $data = mysqli_query($con, $query);

    if($data)
    {
        $_SESSION['message'] = "Updated...";
        header('Location: view-users.php');
        exit(0);
    }
}


if(isset($_POST['user_delete']))
{
    $user_id = $_POST['user_delete'];

    $query = "DELETE FROM users WHERE id='$user_id'";
    $data = mysqli_query($con, $query);

    if($data)
    {
        $_SESSION['message'] = "User/Admin Deleted Successfully";
        header('Location: view-users.php');
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Something Went Wrong.!";
        header('Location: view-users.php');
        exit(0);
    }
}


if(isset($_POST['add_categories']))
{
    $name = $_POST['name'];
    $slug = $_POST['slug'];
    $des = $_POST['des'];
    $m_title = $_POST['m_title'];
    $m_des = $_POST['m_des'];
    $m_key = $_POST['m_key'];
    $navbar_s = $_POST['nav_s'];
    $status = $_POST['status'];
    $foot = $_POST['footer'];
    $tag = $_POST['tag'];


    $query = "INSERT INTO categories (name, slug, des, meta_title, meta_des, meta_key, navbar_status, status, fot, tag) VALUES ('$name', '$slug', '$des', '$m_title', '$m_des', '$m_key', '$navbar_s', '$status', '$foot', '$tag') ";
    $data = mysqli_query($con, $query);

    if($data)
    {
        $_SESSION['message'] = "Categories Added Successfully";
        header('Location: view-categories.php');
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Something Went Wrong.!";
        header('Location: index.php');
        exit(0);
    }


}

if(isset($_POST['up_cate'])) {

    $name = $_POST['name'];
    $slug = $_POST['slug'];
    $des = $_POST['des'];
    $met = $_POST['m_t'];
    $med = $_POST['m_d'];
    $mek = $_POST['m_k'];
    $ns = $_POST['n_s'];
    $s = $_POST['s'];
    $cat_id = $_POST['id'];
    $foot = $_POST['fot'];
    $tag = $_POST['tag'];






    $query = "UPDATE categories SET name='$name', slug='$slug', des='$des',	meta_title='$met', meta_des='$med', meta_key = '$mek', navbar_status='$ns', status='$s', fot='$foot', tag='$tag' WHERE id='$cat_id' ";
    $data = mysqli_query($con, $query);

    if($data)
    {
        $_SESSION['message'] = "Updated...";
        header('Location: view-categories.php');
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Something Wrong...";
        header('Location: view-categories.php');
        exit(0);
    }
}


if(isset($_POST['categories_delete']))
{
    $cat_id = $_POST['categories_delete'];
    $sta = '2';

    $query = "UPDATE categories SET status='$sta' WHERE id='$cat_id'";
    $data = mysqli_query($con, $query);

    if($data)
    {
        $_SESSION['message'] = "Categories Deleted Successfully";
        header('Location: view-categories.php');
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Something Went Wrong.!";
        header('Location: view-categories.php');
        exit(0);
    }
}


if(isset($_POST['re_cat']))
{
    $cat_id = $_POST['re_cat'];
    $sta = '0';

    $query = "UPDATE categories SET status='$sta' WHERE id='$cat_id'";
    $data = mysqli_query($con, $query);

    if($data)
    {
        $_SESSION['message'] = "Categories Deleted Successfully";
        header('Location: re_categories.php');
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Something Went Wrong.!";
        header('Location: re_categories.php');
        exit(0);
    }
}


if(isset($_POST['post_delete']))
{
    $post_id = $_POST['post_delete'];
    $sta = '2';

    $query = "UPDATE posts SET d_p='$sta' WHERE id='$post_id'";
    $data = mysqli_query($con, $query);

    if($data)
    {
        $_SESSION['message'] = "Post Deleted Successfully";
        header('Location: view-posts.php');
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Something Went Wrong.!";
        header('Location: view-posts.php');
        exit(0);
    }
}


if(isset($_POST['re_post']))
{
    $post_id = $_POST['re_post'];
    $sta = '0';

    $query = "UPDATE posts SET d_p='$sta' WHERE id='$post_id'";
    $data = mysqli_query($con, $query);

    if($data)
    {
        $_SESSION['message'] = "Post Deleted Successfully";
        header('Location: re_posts.php');
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Something Went Wrong.!";
        header('Location: re_posts.php');
        exit(0);
    }
}

if(isset($_POST['add_post']))
{
    $category_id = $_POST['category_id'];
    $name = $_POST['name'];
    $slug = $_POST['slug'];
    $des = $_POST['des'];
    $m_title = $_POST['m_title'];
    $m_des = $_POST['m_des'];
    $m_key = $_POST['m_key'];
    $status = $_POST['status'];
    $f_post = $_POST['f_post'];
    $m_post = $_POST['m_p'];

    $image = $_FILES['image']['name'];
    $image_extension = pathinfo($image, PATHINFO_EXTENSION);
    $filename = time().'.'.$image_extension;

    $data = "INSERT INTO posts (cat_id, name, slug, des, image, m_title, m_des, m_key, status, f_p, m_p) VALUES ('$category_id', '$name', '$slug', '$des', '$filename', '$m_title ', '$m_des', '$m_key', '$status', '$f_post', '$m_post')";

    $sql = mysqli_query($con, $data);
    
    if($sql)
    {
        move_uploaded_file($_FILES['image']['tmp_name'] , '../uploads/posts/'.$filename);
        $_SESSION['message'] = "Posts Add Successfully!";
        header('Location: view-posts.php');
        exit(0);
    }
    else {
        $_SESSION['message'] = "Sometthing wrong!";
        header('Location: view-posts.php');
        exit(0);
    }

}

if(isset($_POST['set_btn']))
{
    $title = $_POST['web_title'];
    $des = $_POST['web_des'];
    $key = $_POST['web_key'];
    $image = $_FILES['fav-icon']['name'];
    $image_extension = pathinfo($image, PATHINFO_EXTENSION);
    $filename = time().'.'.$image_extension;

    $setting_query = "INSERT INTO setting (image, title, des, keyword) VALUES ('$filename', '$title', '$des', '$key')";
    $setting_query_run = mysqli_query($con, $setting_query);

    if($setting_query_run)
    {
        move_uploaded_file($_FILES['image']['tmp_name'] , '../uploads/fav-icon/'.$filename);
        $_SESSION['message'] = "Setting Save";
        header('Location: setting.php');
        exit(0);
    }
    else {
        $_SESSION['message'] = "Sometthing wrong!";
        header('Location: setting.php');
        exit(0);
    }
}


if(isset($_POST['set_btn_up']))
{
    $title = $_POST['web_title'];
    $des = $_POST['web_des'];
    $key = $_POST['web_key'];

    $old_filename = $_POST['fav-icon-old'];
    $image = $_FILES['fav-icon']['name'];


    $update_filename = "";
    if($image != NULL)
    {
        // Rename this image
        $image_extension = pathinfo($image, PATHINFO_EXTENSION);
        $filename = time().'.'.$image_extension;

        $update_filename = $filename;
    }
    else
    {
        $update_filename = $old_filename;
    }

    $data = "UPDATE setting SET title='$title', des='$des', keyword='$key', image='$update_filename' WHERE id='0' ";

    $sql = mysqli_query($con, $data);

    if($sql)
    {
        if($image != NULL){
            if(file_exists('../uploads/fav-icon/'.$old_filename)){
                unlink("../uploads/fav-icon/".$old_filename);

            }
            move_uploaded_file($_FILES['fav-icon']['tmp_name'], '../uploads/fav-icon/'.$update_filename);
        }
        header('Location: setting.php');
        exit(0);        
    }
    else
    {
        echo "Something Went Wrong.!";
        header('Location: setting.php');
        exit(0);
        
    }


}

if(isset($_POST['post_update']))
{
    $post_id = $_POST['id'];

    $category_id = $_POST['category_id'];
    $name = $_POST['name'];
    $slug = $_POST['slug'];
    $des = $_POST['des'];
    $m_title = $_POST['m_title'];
    $m_des = $_POST['m_des'];
    $m_key = $_POST['m_key'];
    $f_post = $_POST['f_post'];
    $m_post = $_POST['m_p'];



    $old_filename = $_POST['old_image'];
    $image = $_FILES['image']['name'];


    $update_filename = "";
    if($image != NULL)
    {
        // Rename this image
        $image_extension = pathinfo($image, PATHINFO_EXTENSION);
        $filename = time().'.'.$image_extension;

        $update_filename = $filename;
    }
    else
    {
        $update_filename = $old_filename;
    }


    $data = "UPDATE posts SET cat_id='$category_id', name='$name', slug='$slug', des='$des', image='$update_filename', m_title='$m_title', m_des='$m_des', m_key='$m_key', f_p='$f_post', m_p='$m_post' WHERE id='$post_id' ";

    $sql = mysqli_query($con, $data);
    
    if($sql)
    {
        if($image != NULL){
            if(file_exists('../uploads/posts/'.$old_filename)){
                unlink("../uploads/posts/".$old_filename);

            }
            move_uploaded_file($_FILES['image']['tmp_name'], '../uploads/posts/'.$update_filename);
        }
        $_SESSION['message'] = "Posts Updated Successfully!";
        header('Location: view-posts.php');
        exit(0);        
    }
    else
    {
        echo "Something Went Wrong.!";
        header('Location: view-posts.php');
        exit(0);
        
    }

}


?>