namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = '23810310264_categories';
    protected $guarded = [];

    public function products()
    {
        return $this->hasMany(Product::class, 'category_id');
    }
}