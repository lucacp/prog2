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
 	 	 f u n c t i o n   v a l i d a t e N a m e ( f i e l d ) { 
 	 	 	 i f ( f i e l d   = =   " " )   r e t u r n   " N o   N a m e   w a s   e n t e r e d . \ n " ; 
 	 	 	 r e t u r n   " " ; 
 	 	 } 
 	 	 f u n c t i o n   v a l i d a t e A g e ( f i e l d ) { 
 	 	 	 i f ( i s N a N ( f i e l d ) )   r e t u r n   " N o   A g e   w a s   e n t e r e d . \ n " ; 
 	 	 	 i f ( f i e l d < 1 8 | | f i e l d > 1 1 0 )   r e t u r n   " A g e   m u s t   b e   b e t w e e n   1 8   a n d   1 1 0 . \ n " ; 
 	 	 	 r e t u r n   " " ; 
 	 	 } 
 	 	 f u n c t i o n   v a l i d a t e P W ( f i e l d ) { 
 	 	 	 i f ( f i e l d   = =   " " )   r e t u r n   " N o   P a s s w o r d   w a s   e n t e r e d . \ n " ; 
 	 	 	 e l s e   i f   ( f i e l d . l e n g t h < 6 ) 
 	 	 	 	 r e t u r n   " P a s s w o r d s   m u s t   b e   a t   l e a s t   6   c h a r a c t e r s . \ n " ; 
 	 	 	 e l s e   i f ( ! / [ a - z ] / . t e s t ( f i e l d ) | | ! / [ A - Z ] / . t e s t ( f i e l d )   | |   !   / [ 0 - 9 ] / . t e s t ( f i e l d ) ) 
 	 	 	 	 r e t u r n   " P a s s w o r d s   r e q u i r e   o n e   e a c h   o f   a - z ,   A - Z   a n d   0 - 9 . \ n " ; 
 	 	 	 r e t u r n   " " ; 
 	 	 } 
 	 	 f u n c t i o n   v a l i d a t e P W 2 ( f i e l d 1 , f i e l d 2 ) { 
 	 	 	 i f ( f i e l d 1 = = f i e l d 2 ) 
 	 	 	 	 r e t u r n   " " ; 
 	 	 	 r e t u r n   " P a s s w o r d s   i s   n o   e q u a l s . \ n " ; 
 	 	 } 
 	 	 f u n c t i o n   t e s t e V a l i d ( f o r m ) { 
 	 	 	 v a r   f a i l ; 
 	 	 	 f a i l   =   v a l i d a t e N a m e ( f o r m . c n a m e . v a l u e ) ; 
 	 	 	 f a i l   + =   v a l i d a t e A g e ( f o r m . c b i r t h . v a l u e ) ; 
 	 	 	 f a i l   + =   v a l i d a t e P W ( f o r m . c p a s s . v a l u e ) ; 
 	 	 	 f a i l   + =   v a l i d a t e P W 2 ( f o r m . c p a s s . v a l u e , f o r m . c p a s s 2 . v a l u e ) ; 
 	 	 	 i f ( f a i l   = =   " " )   
 	 	 	 	 r e t u r n   t r u e ; 
 	 	 	 e l s e { 
 	 	 	 	 a l e r t ( f a i l ) ; 
 	 	 	 	 r e t u r n   f a l s e ; 
 	 	 	 } 
 	 	 } 
 	 < / s c r i p t > 
 	 < / h e a d > 
 	 < b o d y > 
 	 	 < d i v > 
 	 	 	 < t a b l e   c l a s s = " s i g n u p "   b o r d e r = " 0 "   c e l l p a d d i n g = " 2 "   c e l l s p a c i n g = " 5 "   b g c o l o r = " # e e e e e e " > 
 	 	 	 	 < t h   c o l s p a n = " 2 "   a l i g n = " c e n t e r " > S i g n u p   F o r m < / t h > 
 	 	 	 	 < f o r m   m e t h o d = " p o s t "   a c t i o n = " "   o n S u b m i t = " r e t u r n   t e s t e V a l i d ( t h i s ) " > 
 	 	 	 	 	 < t r > 
 	 	 	 	 	 	 < t d > < l a b e l   f o r = " c N a " > N o m e : < / l a b e l > < / t d > 
 	 	 	 	 	 	 < t d > < i n p u t   o n b l u r = " t e s t N u l l ( ' c N a ' ) "   i d = " c N a "   t y p e = " t e x t "   n a m e = " c n a m e "   / > < / t d > 
 	 	 	 	 	 < / t r > 
 	 	 	 	 	 < t r > 
 	 	 	 	 	 	 < t d > < l a b e l   f o r = " c B D " > I d a d e : < / l a b e l > < / t d > 
 	 	 	 	 	 	 < t d > < i n p u t   i d = " c B D "   t y p e = " t e x t "   n a m e = " c b i r t h "   / > < / t d > 
 	 	 	 	 	 < / t r > 
 	 	 	 	 	 < t r > 
 	 	 	 	 	 	 < t d > < l a b e l   f o r = " c P w " > S e n h a : < / l a b e l > < / t d > 
 	 	 	 	 	 	 < t d > < i n p u t   i d = " c P w "   t y p e = " p a s s w o r d "   n a m e = " c p a s s "   / > < / t d > 
 	 	 	 	 	 < / t r > 
 	 	 	 	 	 < t r > 
 	 	 	 	 	 	 < t d > < l a b e l   f o r = " c P W " > C o n f i r m a r   S e n h a : < / l a b e l > < / t d > 
 	 	 	 	 	 	 < t d > < i n p u t   i d = " c P W "   t y p e = " p a s s w o r d "   n a m e = " c p a s s 2 "   / > < / t d > 
 	 	 	 	 	 < / t r > 
 	 	 	 	 	 < t r > < t d   c o l s p a n = " 2 "   a l i g n = " c e n t e r " > < i n p u t   t y p e = " s u b m i t "   n a m e = " p o s t s "   v a l u e = " E n v i a r "   / > < / t d > < / t r > 
 	 	 	 	 < / f o r m > 
 	 	 	 < / t a b l e > 
 	 	 < / d i v > 
 	 < / b o d y > 
 < / h t m l > 
 