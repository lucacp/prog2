< ! D O C T Y P E   h t m l > 
 < h t m l > 
 	 < h e a d > 
 	 	 < t i t l e > T e s t e < / t i t l e > 
 	 	 < m e t a   c h a r s e t = " U T F - 1 6 L E " > 
 	 < s c r i p t   t y p e = " t e x t / j a v a s c r i p t " > 
 	 	 f u n c t i o n   t e s t N u l l ( i d ) { 
 	 	 	 v a r   x = d o c u m e n t . g e t E l e m e n t B y I d ( i d ) . b l u r ( ) ; 
 	 	 	 i f ( x = = n u l l | | x = = " " ) { 
 	 	 	 	 r e t u r n   " C a m p o   O b r i g a t � r i o . \ \ n " ; 
 	 	 	 } 
 	 	 	 r e t u r n   " " ; 
 	 	 } 
 	 	 f u n c t i o n   t e s t P a s s ( i d , i d 2 ) { 
 	 	 	 v a r   x = d o c u m e n t . g e t E l e m e n t B y I d ( i d ) ; 
 	 	 	 v a r   y = d o c u m e n t . g e t E l e m e n t B y I d ( i d 2 ) . b l u r ( ) ; 
 	 	 	 i f ( x = = y ) { 
 	 	 	 	 r e t u r n   " S e n h a   d e v e   s e r   i g u a l . \ \ n " ; 
 	 	 	 } 
 	 	 	 r e t u r n   " " ; 	 
 	 	 } 
 	 	 f u n c t i o n   t e s t e V a l i d ( i d [ ] ) { 
 	 	 	 v a r   f a i l ; 
 	 	 	 f a i l   =   ' N o m e   �   ' . t e s t N u l l ( i d [ 1 ] ) ; 
 	 	 	 f a i l   . =   ' D a t a   d e   N a s c i m e n t o   �   ' . t e s t N u l l ( i d [ 2 ] ) ; 
 	 	 	 f a i l   . =   ' s e n h a   �   ' . t e s t N u l l ( i d [ 3 ] ) ; 
 	 	 	 f a i l   . =   t e s t P a s s ( i d [ 3 ] , i d [ 4 ] ) ; 
 	 	 	 i f ( f a i l   = =   " " )   
 	 	 	 	 r e t u r n   t r u e ; 
 	 	 	 e l s e {   
 	 	 	 	 a l e r t ( f a i l ) ;   
 	 	 	 	 r e t u r n   f a l s e ; 
 	 	 	 } 
 	 	 } 
 	 < / s c r i p t > 
 	 < / h e a d > 
 	 < b o d y > 
 	 	 < f o r m   m e t h o d = " p o s t "   a c t i o n = " "   o n s u b m i t = " t e s t e V a l i d ( ' c N a ' , ' c B D ' , ' c P w ' , ' c P W ' ) " > 
 	 	 	 < d i v > 
 	 	 	 	 < l a b e l   f o r = " c N a " > N o m e : < / l a b e l > 
 	 	 	 	 < i n p u t   o n b l u r = " t e s t N u l l ( ' c N a ' ) "   i d = " c N a "   t y p e = " t e x t "   n a m e = " c n a m e "   / > 
 	 	 	 < / d i v > 
 	 	 	 < d i v > 
 	 	 	 	 < l a b e l   f o r = " c B D " > D a t a   d e   N a s c i m e n t o : < / l a b e l > 
 	 	 	 	 < i n p u t   i d = " c B D "   t y p e = " t e x t "   n a m e = " c b i r t h "   / > 
 	 	 	 < / d i v > 
 	 	 	 < d i v > 
 	 	 	 	 < l a b e l   f o r = " c P w " > S e n h a : < / l a b e l > 
 	 	 	 	 < i n p u t   i d = " c P w "   t y p e = " p a s s w o r d "   n a m e = " c p a s s "   / > 
 	 	 	 < / d i v > 
 	 	 	 < d i v > 
 	 	 	 	 < l a b e l   f o r = " c P W " > C o n f i r m a r   S e n h a : < / l a b e l > 
 	 	 	 	 < i n p u t   i d = " c P W "   t y p e = " p a s s w o r d "   n a m e = " c p a s s 2 "   / > 
 	 	 	 < / d i v > 
 	 	 	 < i n p u t   t y p e = " s u b m i t "   n a m e = " p o s t s "   v a l u e = " E n v i a r "   / > 
 	 	 < / f o r m > 
 	 < / b o d y > 
 < / h t m l > 
 