<?php include 'inc/header.php'; ?>

<div class=" py-12 min-h-screen">
    <div class="max-w-[958px] mx-auto px-4 flex flex-col md:flex-row gap-8">
        
        <?php  
        if (!isset($_GET['pageid']) || $_GET['pageid'] == NULL) {
            echo "<script>window.location = 'index.php'; </script>";  
        } else {
           $pageid = $_GET['pageid'];
        }
        ?>

        <main class="main-area flex-1">
            <?php
                $pagequery = "SELECT * FROM tbl_page WHERE id = '$pageid'";
                $detailspage = $db->select($pagequery);
                if ($detailspage) {
                    while ($result = $detailspage->fetch_assoc()){ ?>  

                <article class="bg-[#111418] rounded-[32px] p-8 md:p-10 border border-white/5 shadow-2xl relative overflow-hidden group">
                    
                    <div class="absolute top-0 right-0 w-32 h-32 bg-[#3DDC84]/5 -rotate-45 translate-x-16 -translate-y-16"></div>

                    <div class="about relative z-10">
                        <div class="flex items-center gap-4 mb-10 pb-6 border-b border-white/5">
                            <div class="h-8 w-1.5 bg-[#3DDC84] rounded-full shadow-[0_0_15px_rgba(61,220,132,0.4)]"></div>
                            <h2 class="text-2xl font-black text-white tracking-tight uppercase">
                                <?php echo $result['name']; ?>
                            </h2>
                        </div>
                        
                        <div class="prose prose-invert max-w-none text-slate-400 text-base leading-[1.8] space-y-6 font-medium">
                            <?php echo $result['body']; ?>
                        </div>
                    </div>
                </article>

            <?php } } else { echo "<script>window.location = '404.php'; </script>"; } ?>
        </main>

        <aside class="w-full md:w-[300px] shrink-0">
            <div class="sticky top-24">
                <?php include 'inc/sidebar.php'; ?>
            </div>
        </aside>

    </div>
</div>

<?php include 'inc/footer.php'; ?>