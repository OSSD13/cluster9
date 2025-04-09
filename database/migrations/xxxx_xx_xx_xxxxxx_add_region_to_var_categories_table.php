public function up()
{
    Schema::table('var_categories', function (Blueprint $table) {
        $table->string('region')->nullable()->after('column_name'); // Replace 'column_name' with the column after which 'region' should be added
    });
}

public function down()
{
    Schema::table('var_categories', function (Blueprint $table) {
        $table->dropColumn('region');
    });
}
