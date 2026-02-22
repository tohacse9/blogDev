<div class="sidebar flex flex-col gap-6"> 
    
    <div class="samesidebar bg-[#0f1113] border border-white/5 rounded-3xl overflow-hidden p-6 shadow-xl group">
        <div class="flex items-center gap-3 mb-6">
            <div class="h-5 w-1 bg-[#3DDC84] rounded-full"></div>
            <h2 class="text-[11px] uppercase tracking-[0.2em] font-black text-slate-100 group-hover:text-[#3DDC84] transition-colors">
                System Categories
            </h2>
        </div>
        
        <ul class="flex flex-col gap-1.5"> 
            <?php
            $query = "SELECT * FROM tbl_category";
            $category = $db->select($query);
            if ($category) {
                while($result = $category->fetch_assoc()) { ?>
                <li>
                    <a href="posts.php?category=<?php echo $result['id'] ?>" 
                       class="flex items-center justify-between px-4 py-3 rounded-2xl bg-white/[0.02] border border-white/5 text-[13px] font-semibold text-slate-400 hover:bg-[#3DDC84]/10 hover:border-[#3DDC84]/30 hover:text-[#3DDC84] transition-all duration-300">
                        <span><?php echo $result['name']; ?></span>
                        <i class="fa fa-angle-right opacity-30 group-hover:translate-x-1 transition-transform"></i>
                    </a>
                </li>
            <?php } } ?>      
        </ul>
    </div>

    <div class="samesidebar bg-[#0f1113] border border-white/5 rounded-3xl p-6 shadow-xl">
        <div class="flex items-center gap-3 mb-8">
            <div class="h-5 w-1 bg-[#3DDC84] rounded-full"></div>
            <h2 class="text-[11px] uppercase tracking-[0.2em] font-black text-slate-100">
                Latest Protocols
            </h2>
        </div>
        
        <div class="flex flex-col gap-6"> 
            <?php
            $query = "SELECT * FROM tbl_post limit 4";
            $post = $db->select($query);
            if($post){
                while($result = $post->fetch_assoc()){ ?>
                <div class="popular group/item flex items-center gap-4">
                    <div class="relative w-16 h-16 shrink-0 rounded-2xl overflow-hidden bg-slate-800 border border-white/10">
                        <a href="post.php?id=<?php echo $result['id'] ?>">
                            <img class="w-full h-full object-cover opacity-80 group-hover/item:opacity-100 group-hover/item:scale-110 transition-all duration-500" 
                                 src="admin/<?php echo $result['image']?>" alt="post image"/>
                        </a>
                    </div>
                    
                    <div class="flex flex-col">
                        <span class="text-[9px] font-bold text-[#3DDC84]/60 uppercase tracking-tighter mb-1">
                            <?php echo $fm->formaDate($result['date']) ?>
                        </span>
                        
                        <h3 class="text-sm font-bold text-slate-300 leading-tight group-hover/item:text-[#3DDC84] transition-colors">
                            <a href="post.php?id=<?php echo $result['id'] ?>">
                                <?php echo $result['title']; ?>
                            </a>
                        </h3>
                    </div>
                </div>
            <?php } } ?>
        </div>
    </div>
</div>