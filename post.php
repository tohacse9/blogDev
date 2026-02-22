<?php include 'inc/header.php'; ?>

<?php  
 // ID check logic as it is
 if (!isset($_GET['id']) || $_GET['id'] == NULL) {
    header("Location: 404.php");
 } else {
   $id = $_GET['id'];
 }
?>

<div class="contentsection contemplete clear py-10 max-w-[958px] mx-auto px-4 flex flex-col md:flex-row gap-8">
    
    <div class="maincontent clear flex-1">
        <div class="about bg-white rounded-[25px] p-8 shadow-xl border-t-[6px] border-[#FF4B2B]">
            <?php
            $query = "SELECT * FROM tbl_post WHERE id='$id'";
            $post = $db->select($query);
            if ($post) {
                while($result = $post->fetch_assoc()) {
            ?>
            
            <div class="flex items-center gap-4 mb-6">
                <div class="h-10 w-2 bg-[#FF4B2B] rounded-full shadow-[0_0_10px_#FF4B2B]"></div>
                <h2 class="text-3xl font-black text-[#1e293b] uppercase tracking-tight leading-tight">
                    <?php echo $result['title']; ?>
                </h2>
            </div>
                            
            <div class="flex items-center gap-4 text-xs font-bold text-gray-400 uppercase tracking-widest mb-8 border-b border-gray-100 pb-4">
                <span class="flex items-center gap-1.5">
                    <i class="fa fa-calendar text-[#FF4B2B]"></i> 
                    <?php echo $fm->formaDate($result['date']); ?>
                </span>
                <span class="flex items-center gap-1.5">
                    <i class="fa fa-user text-[#FF4B2B]"></i> By 
                    <a href="#" class="text-[#1e293b] hover:text-[#FF4B2B] transition-colors"><?php echo $result['author']; ?></a>
                </span>
            </div>

            <div class="mb-8 overflow-hidden rounded-2xl shadow-lg">
                <img src="admin/<?php echo $result['image']; ?>" alt="post image" class="w-full h-auto object-cover"> 
            </div>
                
            <div class="text-gray-600 text-lg leading-relaxed space-y-6 font-medium">
                <?php echo $fm->textShroten($result['body']); ?>
            </div>
            
            <hr class="my-10 border-gray-100">

            <div class="relatedpost clear">
                <h2 class="text-xl font-black text-[#1e293b] uppercase tracking-tighter mb-6 flex items-center gap-2">
                    <i class="fa fa-paper-plane text-[#FF4B2B] text-sm"></i> Related articles
                </h2>
                
                <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                    <?php 
                    $catid = $result['cat'];
                    $queryreleted = "SELECT * FROM tbl_post WHERE cat='$catid' limit 6";
                    $reletedpost = $db->select($queryreleted);
                    if ($reletedpost) {
                        while($rresult = $reletedpost->fetch_assoc()) {
                    ?>
                        <div class="group relative overflow-hidden rounded-xl aspect-video shadow-md border border-gray-100">
                            <a href="post.php?id=<?php echo $rresult['id']; ?>">
                                <img src="admin/<?php echo $rresult['image']; ?>" alt="post image" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500"/>
                                <div class="absolute inset-0 bg-gradient-to-t from-black/80 to-transparent flex items-end p-2">
                                    <p class="text-white text-[9px] font-bold uppercase truncate"><?php echo $rresult['title']; ?></p>
                                </div>
                            </a>
                        </div>
                    <?php } } else { echo "<p class='text-gray-400 text-xs italic'>No Related articles</p>"; } ?>
                </div>
            </div>
            
            <?php } } else { header("location:404.php"); } ?>
        </div>
    </div>

    <aside class="w-full md:w-[300px]">
        <div class="sticky top-24">
            <?php include 'inc/sidebar.php'; ?>
        </div>
    </aside>

</div>

<?php include 'inc/footer.php'; ?>