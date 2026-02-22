<footer class="bg-[#05070a] pt-20 pb-10 px-6 relative border-t border-[#3DDC84]/10">
    
    <div class="absolute inset-0 opacity-[0.03] pointer-events-none" 
         style="background-image: radial-gradient(#3DDC84 1px, transparent 1px); background-size: 20px 20px;"></div>

    <div class="max-w-[1000px] mx-auto relative z-10">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-12 mb-16 items-center">
            
            <div class="text-center md:text-left">
                <h2 class="text-2xl font-black text-white tracking-tighter italic">
                    ANDROID<span class="text-[#3DDC84] not-italic">_EXPERTS</span>
                </h2>
                <div class="h-1 w-12 bg-[#3DDC84] mt-2 mb-4 mx-auto md:mx-0 rounded-full animate-pulse"></div>
                <p class="text-[10px] text-slate-500 uppercase tracking-widest leading-loose">
                    Decoding the Future of Android Ecosystem.
                </p>
            </div>

            <nav class="flex justify-center">
                <ul class="flex flex-wrap justify-center gap-4">
                    <li><a href="index.php" class="foot-pill">Home.sys</a></li>
                    <li><a href="about.php" class="foot-pill">About.sh</a></li>
                    <li><a href="contact.php" class="foot-pill">Contact.io</a></li>
                    <li><a href="privacy.php" class="foot-pill">Privacy.cfg</a></li>
                </ul>
            </nav>

            <div class="bg-white/[0.02] border border-white/5 p-4 rounded-2xl backdrop-blur-sm">
                <div class="flex items-center justify-between text-[10px] font-mono mb-2">
                    <span class="text-slate-500">System Status:</span>
                    <span class="text-[#3DDC84]">Online</span>
                </div>
                <div class="w-full bg-white/5 h-1 rounded-full overflow-hidden">
                    <div class="bg-[#3DDC84] h-full w-[85%]"></div>
                </div>
            </div>
        </div>

        <div class="pt-8 border-t border-white/5 text-center">
            <?php
            $query = "SELECT * FROM tbl_footer WHERE id=1";
            $footerNote = $db->select($query);
            if ($footerNote) {
                while ($result = $footerNote->fetch_assoc()){
            ?>  
                <p class="text-[10px] font-mono text-slate-600">
                    <span class="text-[#3DDC84] mr-2">>></span> 
                    &copy; <?php echo $result['note'] ?> | NODE_<?php echo date('Y'); ?> 
                    <span class="ml-2 text-[#3DDC84]">_LOG_END</span>
                </p>
            <?php } } ?>  
        </div>
    </div>
</footer>

<div class="fixedicon fixed right-6 top-1/2 -translate-y-1/2 z-50 flex flex-col gap-4">
    <div class="bg-black/40 backdrop-blur-xl p-2 rounded-full border border-white/10 shadow-2xl">
        <a href="http://facebook.com" class="social-hex group border-blue-600/30">
            <img src="images/fb.png" alt="FB" class="w-4 h-4 grayscale group-hover:grayscale-0 group-hover:scale-125 transition-all" />
        </a>
        <a href="http://twitter.com" class="social-hex group border-sky-400/30 my-3">
            <img src="images/tw.png" alt="TW" class="w-4 h-4 grayscale group-hover:grayscale-0 group-hover:scale-125 transition-all" />
        </a>
        <a href="http://linkedin.com" class="social-hex group border-blue-700/30">
            <img src="images/in.png" alt="IN" class="w-4 h-4 grayscale group-hover:grayscale-0 group-hover:scale-125 transition-all" />
        </a>
    </div>
</div>

<style>
    /* Interesting Pills for Footer */
    .foot-pill {
        @apply px-4 py-2 border border-white/5 bg-white/[0.03] rounded-full text-[10px] font-bold uppercase tracking-widest text-slate-400 hover:text-white hover:bg-[#3DDC84] hover:border-[#3DDC84] transition-all duration-500 shadow-inner;
    }

    /* Hexagon/Circle Social Dock */
    .social-hex {
        @apply w-10 h-10 flex items-center justify-center rounded-full border bg-white/5 hover:bg-white/10 transition-all shadow-lg;
    }

    /* Scroll Top Custom Style */
    #scrollToTop {
        @apply scale-75 hover:scale-100 transition-all bg-transparent border-2 border-[#3DDC84] text-[#3DDC84] !important;
    }
</style>