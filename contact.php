<?php include 'inc/header.php'; ?>

<div class="bg-[#0b0e14] py-12 min-h-screen">
    <div class="max-w-[958px] mx-auto px-4">
        
        <div class="maincontent bg-[#111418] p-8 md:p-12 rounded-[32px] border border-white/5 shadow-2xl relative overflow-hidden group">
            
            <div class="absolute top-0 right-0 w-32 h-32 bg-[#3DDC84]/5 -rotate-45 translate-x-16 -translate-y-16"></div>

            <div class="about relative z-10">
                <div class="flex items-center gap-4 mb-12">
                    <div class="h-10 w-1.5 bg-[#3DDC84] rounded-full shadow-[0_0_15px_rgba(61,220,132,0.4)]"></div>
                    <div>
                        <h2 class="text-3xl font-black text-white uppercase tracking-tighter">Contact_Protocol</h2>
                        <p class="text-[10px] text-slate-500 uppercase tracking-[0.3em] mt-1 font-bold italic">Establish Communication Link</p>
                    </div>
                </div>

                <?php if (isset($msg)){ ?>
                    <div class="bg-[#3DDC84]/10 text-[#3DDC84] px-6 py-4 rounded-2xl mb-10 border border-[#3DDC84]/20 text-xs font-black flex items-center gap-4 shadow-sm animate-pulse">
                        <i class="fa fa-terminal text-lg"></i> // SYSTEM_MSG: <?php echo $msg; ?>
                    </div>
                <?php } ?>

                <form action="" method="post" class="space-y-8">
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <div class="space-y-3">
                            <label class="text-[10px] font-black text-slate-500 uppercase tracking-widest ml-1">01. First_Name</label>
                            <input type="text" name="firstname" placeholder="USER_IDENTIFIER" 
                                   class="w-full px-6 py-4 bg-white/[0.02] border border-white/10 rounded-2xl focus:ring-2 focus:ring-[#3DDC84]/30 focus:border-[#3DDC84] outline-none text-sm transition-all text-white font-medium placeholder:text-slate-700"/>
                            <?php if (isset($fname)) echo "<span class='text-red-500 text-[9px] font-black mt-2 block uppercase tracking-widest italic animate-bounce'>// ERROR: $fname</span>"; ?>
                        </div>

                        <div class="space-y-3">
                            <label class="text-[10px] font-black text-slate-500 uppercase tracking-widest ml-1">02. Last_Name</label>
                            <input type="text" name="lastname" placeholder="SURNAME_X" 
                                   class="w-full px-6 py-4 bg-white/[0.02] border border-white/10 rounded-2xl focus:ring-2 focus:ring-[#3DDC84]/30 focus:border-[#3DDC84] outline-none text-sm transition-all text-white font-medium placeholder:text-slate-700"/>
                            <?php if (isset($lname)) echo "<span class='text-red-500 text-[9px] font-black mt-2 block uppercase tracking-widest italic animate-bounce'>// ERROR: $lname</span>"; ?>
                        </div>
                    </div>

                    <div class="space-y-3">
                        <label class="text-[10px] font-black text-slate-500 uppercase tracking-widest ml-1">03. Secure_Email</label>
                        <input type="email" name="email" placeholder="ACCESS_POINT@DOMAIN.COM" 
                               class="w-full px-6 py-4 bg-white/[0.02] border border-white/10 rounded-2xl focus:ring-2 focus:ring-[#3DDC84]/30 focus:border-[#3DDC84] outline-none text-sm transition-all text-white font-medium placeholder:text-slate-700"/>
                        <?php if (isset($emailErr)) echo "<span class='text-red-500 text-[9px] font-black mt-2 block uppercase tracking-widest italic animate-bounce'>// ERROR: $emailErr</span>"; ?>
                    </div>

                    <div class="space-y-3">
                        <label class="text-[10px] font-black text-slate-500 uppercase tracking-widest ml-1">04. Transmission_Body</label>
                        <textarea name="body" placeholder="WRITE_DATA_HERE..." 
                                  class="w-full px-6 py-4 bg-white/[0.02] border border-white/10 rounded-2xl focus:ring-2 focus:ring-[#3DDC84]/30 focus:border-[#3DDC84] outline-none text-sm h-48 resize-none transition-all text-white font-medium placeholder:text-slate-700"></textarea>
                        <?php if (isset($bodyErr)) echo "<span class='text-red-500 text-[9px] font-black mt-2 block uppercase tracking-widest italic animate-bounce'>// ERROR: $bodyErr</span>"; ?>
                    </div>

                    <div class="pt-6">
                        <button type="submit" name="submit" 
                                class="bg-[#3DDC84] hover:bg-[#2fb16a] text-black px-12 py-5 rounded-full font-black text-[11px] uppercase tracking-[0.4em] transition-all shadow-[0_10px_30px_rgba(61,220,132,0.2)] active:scale-95 flex items-center gap-4 group/btn">
                            Execute_Send 
                            <i class="fa fa-paper-plane transform group-hover/btn:translate-x-2 group-hover/btn:-translate-y-1 transition-transform"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include 'inc/footer.php'; ?>