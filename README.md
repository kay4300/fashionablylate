#   お問い合わせフォーム

## *環境構築*
### Dockerビルド  
1.git clone: git@github.com:kay4300/fashionablylate.git  
2.docker compose up -d --build  
＊MySQLはOSによってきどうしないばあいがあるのでそれぞれのPCに合わせてdocker-compose.ymlファイルを編集してください。  

### Laravel環境構築  
1.docker compose exec php bash  
2.composer install  
3..env.exampleファイルから.envを作成し環境変数を変更  
4.php artisan key:generate  
5.php artisan migrate  
6.php artisan db:seed  

## *ER図*  
<mxGraphModel><root><mxCell id="0"/><mxCell id="1" parent="0"/><mxCell id="2" edge="1" parent="1" style="edgeStyle=entityRelationEdgeStyle;fontSize=12;html=1;endArrow=ERzeroToMany;endFill=1;startArrow=ERzeroToMany;rounded=0;" value=""><mxGeometry height="100" relative="1" width="100" as="geometry"><mxPoint x="280" y="267" as="sourcePoint"/><mxPoint x="360" y="100" as="targetPoint"/></mxGeometry></mxCell></root></mxGraphModel>

## *使用技術*  
php 8.1.33  
Laravel 8.83.8  
MySQL 8.0.26  

## *URL*
開発環境：http://localhost  
phpMyAdmin：http://localhost:8080  


