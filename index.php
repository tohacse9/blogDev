<?php 
    include 'inc/header.php';
    include 'inc/slider.php';
?>

<div class=" py-10">
    <div class="max-w-[958px] mx-auto px-4 clear">
        <div class="flex flex-col lg:flex-row gap-6">
            
            <main class="flex-1 min-w-0">
                <?php 
                    $per_page = 4; 
                    if(isset($_GET['page'])){
                        $page = $_GET['page'];  
                    } else { 
                        $page = 1;
                    }
                    $start_form = ($page - 1) * $per_page;

                    $query = "SELECT * FROM tbl_post LIMIT $start_form, $per_page";
                    $post = $db->select($query);
                    
                    if($post){
                ?>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                    <?php while($result = $post->fetch_assoc()){ ?>
                        <article class="group bg-[#111418] rounded-[24px] border border-white/5 overflow-hidden flex flex-col h-full hover:border-[#3DDC84]/20 transition-all duration-300">
                            
                            <div class="relative h-44 overflow-hidden">
                                <a href="post.php?id=<?php echo $result['id'] ?>">
                                    <img class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105" 
                                         src="admin/<?php echo $result['image']?>" alt="post image"/>
                                </a>
                                <div class="absolute top-3 left-3">
                                    <span class="bg-[#3DDC84] text-black text-[8px] font-black px-2.5 py-1 rounded-lg uppercase tracking-widest shadow-xl">
                                        <?php echo $result['author'] ?>
                                    </span>
                                </div>
                            </div>

                            <div class="p-5 flex flex-col flex-1">
                                <span class="text-[9px] font-bold text-slate-500 uppercase tracking-[0.2em] mb-2 flex items-center gap-2">
                                    <span class="w-1 h-1 bg-[#3DDC84] rounded-full"></span>
                                    <?php echo $fm->formaDate($result['date'] ) ?>
                                </span>

                                <h2 class="text-base font-bold text-white leading-snug group-hover:text-[#3DDC84] transition-colors mb-3">
                                    <a href="post.php?id=<?php echo $result['id'] ?>">
                                        <?php echo $fm->textShroten($result['title'], 50) ?>
                                    </a>
                                </h2>

                                <p class="text-slate-400 text-xs leading-relaxed line-clamp-2 mb-4 opacity-70">
                                    <?php echo $fm->textShroten($result['body'], 90) ?>
                                </p>

                                <div class="mt-auto pt-4 border-t border-white/5 flex items-center justify-between">
                                    <a href="post.php?id=<?php echo $result['id'] ?>" class="text-[10px] font-black uppercase text-slate-400 group-hover:text-[#3DDC84] transition-all flex items-center gap-2">
                                        Open Protocol <i class="fa fa-arrow-right text-[8px]"></i>
                                    </a>
                                </div>
                            </div>
                        </article>
                    <?php } ?>
                </div>

                <div class="mt-12 flex justify-center">
                    <nav class="flex items-center gap-1.5 bg-[#111418] p-1.5 rounded-2xl border border-white/5">
                        <?php 
                            $query = "SELECT * FROM tbl_post";
                            $res = $db->select($query);
                            $total_rows = mysqli_num_rows($res);
                            $total_pages = ceil($total_rows / $per_page);

                            if($page > 1) {
                                $prev = $page - 1;
                                echo "<a href='index.php?page=$prev' class='p-2.5 text-slate-500 hover:text-[#3DDC84] transition-colors'><i class='fa fa-angle-left'></i></a>";
                            }

                            for($i = 1; $i <= $total_pages; $i++){
                                $activeClass = ($i == $page) ? 'bg-[#3DDC84] text-black shadow-[0_0_10px_rgba(61,220,132,0.3)]' : 'text-slate-500 hover:text-white';
                                echo "<a href='index.php?page=$i' class='w-9 h-9 flex items-center justify-center rounded-xl text-xs font-black transition-all $activeClass'>$i</a>";
                            }

                            if($page < $total_pages) {
                                $next = $page + 1;
                                echo "<a href='index.php?page=$next' class='p-2.5 text-slate-500 hover:text-[#3DDC84] transition-colors'><i class='fa fa-angle-right'></i></a>";
                            }
                        ?>
                    </nav>
                </div>

                <?php } else { echo "<script>window.location = '404.php'; </script>"; } ?>
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