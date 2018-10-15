<?php
namespace MathPHP\Probability\Distribution\Continuous;

use MathPHP\Exception\MathException;
use MathPHP\Functions\Special;
use MathPHP\Functions\Support;

/**
 * Beta distribution
 * https://en.wikipedia.org/wiki/Beta_distribution
 */
class Beta extends Continuous
{
    /**
     * Distribution parameter bounds limits
     * α ∈ (0,∞)
     * β ∈ (0,∞)
     * @var array
     */
    const PARAMETER_LIMITS = [
        'α' => '(0,∞)',
        'β' => '(0,∞)',
    ];

    /**
     * Distribution support bounds limits
     * x ∈ [0,1]
     * @var array
     */
    const SUPPORT_LIMITS = [
        'x' => '[0,1]',
    ];

    /** @var number Shape Parameter */
    protected $α;

    /** @var number Shape Parameter */
    protected $β;

    /**
     * Constructor
     *
     * @param float $α shape parameter α > 0
     * @param float $β shape parameter β > 0
     */
    public function __construct(float $α, float $β)
    {
        parent::__construct($α, $β);
    }

    /**
     * Probability density function
     *
     *       xᵃ⁻¹(1 - x)ᵝ⁻¹
     * pdf = --------------
     *           B(α,β)
     *
     * @param float $x x ∈ (0,1)
     *
     * @return float
     */
    public function pdf(float $x): float
    {
        Support::checkLimits(self::SUPPORT_LIMITS, ['x' => $x]);

        $α = $this->α;
        $β = $this->β;

        $xᵃ⁻¹ = pow($x, $α - 1);
        $⟮1 − x⟯ᵝ⁻¹ = pow(1 - $x, $β - 1);
        $B⟮α、β⟯ = Special::beta($α, $β);
        return ($xᵃ⁻¹ * $⟮1 − x⟯ᵝ⁻¹) / $B⟮α、β⟯;
    }

    /**
     * Cumulative distribution function
     *
     * cdf = Iₓ(α,β)
     *
     * @param float $x x ∈ (0,1)
     *
     * @return float
     */
    public function cdf(float $x): float
    {
        Support::checkLimits(self::SUPPORT_LIMITS, ['x' => $x]);

        $α = $this->α;
        $β = $this->β;

        return Special::regularizedIncompleteBeta($x, $α, $β);
    }

    /**
     * Mean of the distribution
     *
     *       α
     * μ = -----
     *     α + β
     *
     * @return float
     */
    public function mean(): float
    {
        $α = $this->α;
        $β = $this->β;

        return $α / ($α + $β);
    }

    /**
     * Inverse cumulative distribution function (quantile function)
     * Iterative method
     *
     * @param float $x
     * @param float $tolerance (optional)
     * @param int   $max_iterations (optional)
     *
     * @return float
     *
     * @throws MathException if it fails to converge on a guess within the tolerance
     */
    public function inverse(float $x, float $tolerance = 1.0e-15, int $max_iterations = 200): float
    {
        list($a, $b) = [0, 2];

        for ($i = 0; $i < $max_iterations; $i++) {
            $guess = ($a + $b) / 2;
            $cdf   = $this->cdf($guess);

            if ($cdf == $x || $cdf == 0) {
                $b = $a;
            } elseif ($cdf > $x) {
                $b = $guess;
            } else {
                $a = $guess;
            }

            if (($b - $a) <= $tolerance) {
                return $guess;
            }
        }

        throw new MathException("Failed to converge on a Beta inverse within a tolerance of $tolerance after {$max_iterations} iterations");
    }
}
