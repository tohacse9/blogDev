<?php include 'inc/header.php'; ?>

<?php  
 if (!isset($_GET['search'])  || $_GET['search'] == NULL) {
    echo "<script>window.location = '404.php'; </script>"; 
 } else {
   $search = $_GET['search'];
 }
?>

<div class="bg-[#0b0e14] py-12 min-h-screen">
    <div class="max-w-[958px] mx-auto px-4">
        <div class="flex flex-col lg:flex-row gap-8">
            
            <main class="maincontent flex-1">
                
                <div class="mb-10 p-6 bg-[#111418] border border-white/5 rounded-3xl flex items-center justify-between">
                    <div class="flex items-center gap-4">
                        <div class="w-1.5 h-6 bg-[#3DDC84] rounded-full"></div>
                        <h2 class="text-white font-bold tracking-tight">
                            QUERY: <span class="text-[#3DDC84] font-mono">"<?php echo $search; ?>"</span>
                        </h2>
                    </div>
                    <span class="text-[10px] font-black text-slate-500 uppercase tracking-widest">Search_Protocol_V.1</span>
                </div>

                <div class="flex flex-col gap-6">
                    <?php
                    $query = "SELECT * FROM tbl_post WHERE title LIKE '%$search%' OR Body LIKE '%$search%'";
                    $post = $db->select($query);
                    if($post){
                        while($result = $post->fetch_assoc()){
                    ?>
                    
                    <div class="samepost bg-[#111418] rounded-[32px] border border-white/5 overflow-hidden transition-all duration-300 hover:border-[#3DDC84]/20 group">
                        <div class="flex flex-col md:flex-row p-2">
                            <div class="md:w-56 h-48 shrink-0 rounded-[24px] overflow-hidden m-2">
                                <a href="post.php?id=<?php echo $result['id'] ?>">
                                    <img class="w-full h-full object-cover grayscale group-hover:grayscale-0 transition-all duration-500" 
                                         src="admin/<?php echo $result['image']?>" alt="post image"/>
                                </a>
                            </div>

                            <div class="p-6 flex flex-col justify-center">
                                <div class="flex items-center gap-3 mb-3">
                                    <span class="text-[10px] font-bold text-[#3DDC84] uppercase tracking-tighter">
                                        <?php echo $fm->formaDate($result['date'] ) ?>
                                    </span>
                                    <span class="w-1 h-1 bg-white/10 rounded-full"></span>
                                    <span class="text-[10px] font-bold text-slate-500 uppercase">
                                        BY: <?php echo $result['author'] ?>
                                    </span>
                                </div>

                                <h2 class="text-xl font-black text-white group-hover:text-[#3DDC84] transition-colors leading-tight mb-4">
                                    <a href="post.php?id=<?php echo $result['id'] ?>">
                                        <?php echo $result['title'] ?>
                                    </a>
                                </h2>

                                <p class="text-slate-400 text-sm leading-relaxed line-clamp-2 mb-6 opacity-80 font-medium"> 
                                    <?php echo $fm->textShroten($result['body'] ) ?>
                                </p>

                                <div class="readmore">
                                    <a href="post.php?id=<?php echo $result['id'] ?>" class="text-[11px] font-black uppercase text-[#3DDC84] flex items-center gap-2 tracking-widest group-hover:gap-4 transition-all">
                                        ACCESS_DATA <i class="fa fa-chevron-right text-[8px]"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php } } else { ?>
                        <div class="text-center py-20 bg-[#111418] rounded-[40px] border border-dashed border-white/10">
                            <div class="text-4xl mb-4">🔍</div>
                            <h3 class="text-white font-black uppercase tracking-tighter text-xl">No_Matches_Found</h3>
                            <p class="text-slate-500 text-sm mt-2">The requested query did not return any data packets.</p>
                            <a href="index.php" class="inline-block mt-8 text-[#3DDC84] text-[10px] font-black uppercase tracking-widest border border-[#3DDC84]/20 px-6 py-3 rounded-full hover:bg-[#3DDC84] hover:text-black transition-all">Return_to_Core</a>
                        </div>
                    <?php } ?>
                </div>
            </main>

            <aside class="w-full lg:w-[300px] shrink-0">
                <div class="sticky top-24">
                    <?php include 'inc/sidebar.php' ?>
                </div>
            </aside>
        </div>
    </div>
</div>

<?php include 'inc/footer.php' ?>